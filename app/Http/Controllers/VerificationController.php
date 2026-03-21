<?php

namespace App\Http\Controllers;

use App\Models\Verification;
use App\Models\Listing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VerificationController extends Controller
{
    // Hiển thị trang xác minh cho một listing cụ thể
    public function show($id)
    {
        $listing = Listing::findOrFail($id);

        $verification = $listing->verifications()->where('status', 'pending')->first();
        if (!$verification) {
            return redirect()->route('listings.create', $listing->id)->with('error', 'Không tìm thấy yêu cầu xác minh nào cho listing này.');
        }
        return view('listings.show_verify', compact('listing', 'verification'));
    }

    // Xử lý việc kiểm tra file .txt trên website người bán
    public function checkVerification($id)
    {
        $listing = Listing::findOrFail($id);
        $verification = $listing->verifications()->where('status', 'pending')->first();
        $protocols = ['http://', 'https://'];
        $success = false;

        if (!$verification) {
            return back()->with('error', 'Không tìm thấy yêu cầu xác minh.');
        }

        foreach ($protocols as $protocol) {
            try {
                $url = $protocol . $listing->domain . '/verification.txt';
                $response = Http::timeout(5)->withoutVerifying()->get($url);

                if ($response->ok() && trim($response->body()) === $verification->id) {
                    $success = true;
                    break;
                }

            } catch (\Exception $e) {
                continue;
            }
        }

        if ($success) {
            $listing->update(['is_verified' => true]);
            $verification->update(['status' => 'success']);
            return redirect()->route('listings.create', $listing->id)->with('success', 'Xác minh thành công! Listing của bạn đã được xác minh sở hữu.');
        }

        return back()->with('error', 'Không tìm thấy file hoặc mã không khớp trên cả HTTP và HTTPS.
                 Vui lòng đảm bảo bạn đã tạo file verification.txt với nội dung đúng trên website của mình và thử lại.');
    }
}
