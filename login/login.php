<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/login_style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 img-container"> <!-- Adjust col-md-* as needed -->
                <!-- Picture here -->
                <img src="../img/Screenshot 2024-06-02 150656.png" class="img-fluid" alt="Picture">
            </div>
            <div class="col-md-8 form-container"> <!-- Adjust col-md-* as needed -->
                <!-- Login form here -->
                <h2>WELCOME</h2>
                <form>
                <label>Name</label><br>
                        <center>
                        <input type="text" class="search__input" placeholder="e.g. elon mask" width="600px">
                        </center>
                    <br>
                        <center>
                        <label>User Name</label><br>
                        <input type="text" class="search__input" placeholder="e.g. elonmusk1971@gmail.com" width="600px">
                        </center>
                    <br>
                        <center>
                        <label>Password</label><br>
                        <input type="text" class="search__input" placeholder="6+ character" width="600px">
                        </center>
                    <br>
                    <div class="form-group form-check">
                        <center>
                        <input type="checkbox" class="form-check-input" id="terms" required>
                        <label class="form-check-label" for="terms">I Agree With Blog Terms Of Service Privacy Policy, And Default Notification Settings</label>
                        </center>
                    </div>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-dark btn-block btn-short">Create Account</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
