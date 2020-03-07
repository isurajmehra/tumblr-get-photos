<style>
    body{background:#021834;color:#fff;font-family:Arial;margin:30px;}
    form input[type="text"]{font-size: 16px;font-weight: 400;line-height: 24px;max-width: 400px;padding: 5px;color: black;background: #fff;outline: none;border: none;border-radius:5px;}
    form button{background:#47b8f8;border:none;padding:8px 20px;border-radius:5px;outline: none;font-size:15px;font-weight:bold;}
    form label{font-size:12px;height:2px;display:block;}
</style>

<form method="GET" action="get.php">
        <label>Tumblr address?</label><br>
    <input type="text" name="url" size="50" placeholder="https://blogname.tumblr.com/"><br><br>
        <label>how many?</label><br>
    <input type="text" name="limit" size="15" value="10">
    <button>Go</button>
</form>