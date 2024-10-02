<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment Calculator Result</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Investment Calculator Result</h2>
    <div class="alert alert-success">
        <p>Estimated retirement savings: <strong>${{ number_format($future_value, 2) }}</strong></p>
    </div>
    <a href="{{ route('investment_calculator.index') }}" class="btn btn-secondary">Back</a>
</div>
</body>
</html>
