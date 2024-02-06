<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <!-- Bootstrap CSS -->
<link href="/assets/css/jquery-ui.min.css" rel="stylesheet"/>
<link href="/assets/css/styles.css" rel="stylesheet" />
<link href="/assets/css/extrastyles.css" rel="stylesheet" />
<script src="/assets/js/jquery-3.7.0.min.js"></script>
<script src="/assets/js/jquery-ui.min.js"></script>

<script src="/assets/js/bootstrap.bundle.5.3.1.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4">Search Page</h2>
                <form action="/s.php" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter search string" name="q">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>

