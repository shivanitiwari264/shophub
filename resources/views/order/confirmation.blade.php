<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- AOS Animation Library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #a1c4fd, #c2e9fb);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            border-radius: 20px;
            padding: 50px;
            max-width: 500px;
            background: white;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }
        .btn-success {
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 600;
        }
        .order-id {
            font-size: 1.3rem;
            font-weight: bold;
        }
        .celebration {
            font-size: 3rem;
            animation: bounce 1s infinite;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card text-center" data-aos="zoom-in" data-aos-duration="1000">

        <div class="celebration text-success mb-3">🎉</div>
        <h1 class="text-success" data-aos="fade-down" data-aos-duration="1200"><i class="fa-solid fa-check-circle"></i> Order Successful!</h1>

        <p class="mt-3 fs-5" data-aos="fade-up" data-aos-duration="1400">
            Thank you for shopping with us ❤️
        </p>

        <p class="mt-2 order-id" data-aos="fade-up" data-aos-duration="1600">
            <i class="fa-solid fa-receipt"></i> Order ID: <span class="text-primary">{{ $orderId }}</span>
        </p>

        @if(session('success'))
            <div class="alert alert-success mt-4" data-aos="fade-in" data-aos-duration="1800">
                <i class="fa-solid fa-thumbs-up"></i> {{ session('success') }}
            </div>
        @endif

        <div class="mt-4" data-aos="fade-up" data-aos-duration="2000">
            <a href="/" class="btn btn-success"><i class="fa-solid fa-shop"></i> Continue Shopping</a>
        </div>

    </div>
</div>

<!-- AOS JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        once: true
    });
</script>

</body>
</html>
