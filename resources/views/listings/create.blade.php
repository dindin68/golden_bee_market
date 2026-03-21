<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng tin bán Website - Golden Bee Market</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm border-0">
            <div class="card-body p-5">
                <h2 class="mb-4 text-warning font-bold">🐝 Đăng bán Website mới</h2>

                <form action="{{ route('listings.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tiêu đề tin đăng</label>
                            <input type="text" name="title" class="form-control"
                                placeholder="Ví dụ: Web bán mật ong 2 năm tuổi" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tên miền (Domain)</label>
                            <input type="text" name="domain" class="form-control" placeholder="abc.com" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Năm thành lập</label>
                            <input type="number" name="founding_year" class="form-control" placeholder="2024">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Ngôn ngữ/Tech stack</label>
                            <input type="text" name="programming_language" class="form-control"
                                placeholder="PHP, Laravel...">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Danh mục</label>
                            <select name="categories_id" class="form-select" required>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Doanh thu tháng ($)</label>
                            <input type="number" name="monthly_revenue" class="form-control" value="0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Chi phí vận hành ($)</label>
                            <input type="number" name="operating_cost" class="form-control" value="0">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Lợi nhuận ròng ($)</label>
                            <input type="number" name="monthly_profit" class="form-control" value="0">
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-warning w-100 fw-bold">ĐĂNG TIN NGAY</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>