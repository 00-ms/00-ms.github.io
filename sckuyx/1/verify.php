<?php
function gcodeGenerateSession($length = 5) {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $token = '';
    $maxRandIndex = strlen($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[random_int(0, $maxRandIndex)];
    }

    return $token;
}

function saveSessionToken($token) {
    $_SESSION['secToken'] = $token;
}

function getSessionToken() {
    if (isset($_SESSION['secToken'])) {
        return $_SESSION['secToken'];
    }
    return null;
}

function validateSessionToken($token) {
    if ($token === getSessionToken()) {
        return true;
    }
    return false;
}

session_start();
if (!isset($_SESSION['userAgent']) || $_SESSION['userAgent'] !== $_SERVER['HTTP_USER_AGENT']) {
    session_regenerate_id(true);
    $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
}

if (!isset($_SESSION['secToken'])) {
    $securityToken = gcodeGenerateSession(5);
    saveSessionToken($securityToken);
} else {
    $securityToken = getSessionToken();
}

if (isset($_POST['gcodeToken'])) {
    $gcodeToken = $_POST['gcodeToken'];

    if (validateSessionToken($gcodeToken)) {
        echo "<form id='gcodeSub' method='POST' action='index.php?gToken=verified'>
        <input type='hidden' name='sessionToken' value='well'>
        </form>
        <script type='text/javascript'>document.getElementById('gcodeSub').submit();</script>";
    } else {
        echo "<script>alert('Sandi yang Anda masukkan salah!'); window.location='verify.php';</script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/gh/alex-hostingg/js@main/tailwind.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <title>Verify to Continue</title>
    <meta author="G-Code | www.g-code.co.id">
    <meta property="og:title" content=" ">
    <meta property="og:type" content="website">
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co.com/0yhbpy7/No-robots-allowed.jpg">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96 text-center border border-gray-300">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-xl font-semibold text-gray-700">Verify to Continue</h1>
        </div>
        
        <form method="POST" id="verifyForm" class="space-y-4">
            <div class="relative flex items-center justify-between border border-gray-400 rounded-lg px-4 py-3 bg-gray-50 shadow-sm cursor-pointer text-lg" id="checkContainer">
                <div class="flex items-center space-x-3">
                    <input id="myCheckbox" type="checkbox" class="hidden mt-1" required>
                    <div id="CheckBox" class="w-8 h-8 flex items-center justify-center text-gray-400">
                        <i class="fa-regular fa-square text-gray-500 text-2xl"></i>
                    </div>
                    <div id="LoadSpinner" class="hidden mt-2 w-8 h-8 flex items-center justify-center">
                        <i class="fa fa-spinner fa-spin text-blue-500 text-2xl"></i>
                    </div>
                    <div id="CheckMark" class="hidden mt-1 w-8 h-8 flex items-center justify-center">
                        <i class="fa fa-check text-green-500 text-2xl"></i>
                    </div>
                    <label for="myCheckbox" class="ml-3 text-gray-700 font-medium">I'm not a robot</label>
                </div>
            </div>
            <input type="hidden" name="gcodeToken" value="<?= $_SESSION['secToken']; ?>">
            <button type="submit" id="btnVerify" class="w-full bg-blue-500 text-white px-4 py-2 rounded shadow-md font-semibold disabled:opacity-50" disabled>Continue</button>
            <hr>
        </form>
        
        <div class="flex items-center justify-between text-gray-500 text-sm mt-4">
            <span>Privacy • Terms</span>
        </div>
    </div>

    <script>
const myCheckbox = document.getElementById('myCheckbox');
const btnVerify = document.getElementById('btnVerify');
const checkContainer = document.getElementById('checkContainer');
const CheckBox = document.getElementById('CheckBox');
const LoadSpinner = document.getElementById('LoadSpinner');
const CheckMark = document.getElementById('CheckMark');

// Ketika klik di container checkbox
checkContainer.addEventListener('click', function() {
    if (!myCheckbox.checked) {
        // Ketika belum dicentang, mulai loading
        CheckBox.classList.add('hidden');
        LoadSpinner.classList.remove('hidden');

        // Simulasi loading 1.0 detik
        setTimeout(function() {
            LoadSpinner.classList.add('hidden');
            CheckMark.classList.remove('hidden');
            myCheckbox.checked = true;
            btnVerify.disabled = false;
        }, 1000); // 1000 ms = 1,0 detik
    }
});
</script>

</body>
</html>