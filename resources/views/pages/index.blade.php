<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!--<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,viewport" />-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="indexcss.css"/>
</head>
<body>
    <div class="box">
        <h2>Masuk</h2>
        <div class="input-box">
            <label>NIS</label>
            <input type="text"/>
        </div>
        <div class="input-box">
            <label>PASSWORD</label>
            <input type="password"/>
        </div>
        <div class="btn-box">
            <a href="#">bantuan</a>
            <div>
                <button>Masuk</button>
                <button>Buat Akun</button>
            </div>
        </div>
    </div>
</body>
<style>

    @charset "utf-8";




body {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: url("{{ asset('assets/img/bgbaru.jpeg') }}")  no-repeat;
    background-size: cover;
}

.box {
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 350px;
    height: 380px;

    border-top: 1px solid rgba(255,255,255,0.5);
    border-left: 1px solid rgba(255,255,255,0.5);
    border-bottom: 1px solid rgba(255,255,255,0.2);
    border-right: 1px solid rgba(255,255,255,0.2);

    backdrop-filter: blur(5px);
    background: rgba(50,50,50,0.3);
}



.box .input-box {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: start;
}

.box > h2 {
    color: rgb(255, 255, 255);
    margin-top: 20px;
}

.box .input-box {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: start;
    margin-bottom: 10px;
}

.box .input-box > label {
    margin-bottom: 5px;
    color: rgb(252, 252, 252);
    font-size: 13px;
}

.box .input-box > input {

    color: rgb(255, 255, 255);
    font-size: 14px;
    height: 35px;
    width: 250px;
    background: rgba(255,255,255,0.3);
    border: 1px solid rgba(255,255,255,0.5);

    border-radius: 10px;

    transition: 0.5s;

    outline: none;
    padding: 0 10px;
}

.box  > input:focus {
    border: 1px solid rgba(255,255,255,0.8);
}

.box .btn-box {
    width: 250px;
    display: flex;
    flex-direction: column;
    align-items: start;
}

.box .btn-box > a {
    outline: none;
    display: block;
    width: 250px;
    text-align: end;
    text-decoration: none;
    font-size: 13px;
    color: rgba(255,255,255,0.9);
}

.box .btn-box > a:hover {
    color: rgba(255,255,255,1);
}

.box .btn-box > div {
    margin-top: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.box .btn-box > div > button {
    outline: none;
    margin-top: 10px;
    display: block;
    font-size: 14px;
    border-radius: 5px;
    transition: 0.5s;
}

.box .btn-box > div > button:nth-of-type(1) {
    width: 120px;
    height: 35px;
    color: rgba(255,255,255,0.9);
    border: 1px solid rgba(106, 113, 151);
    background: rgba(106, 113, 151);
}

.box .btn-box > div > button:nth-of-type(2) {
    width: 120px;
    height: 35px;
    margin-left: 10px;
    color: rgba(255,255,255,0.9);
    border: 1px solid rgba(106, 113, 151);
    background: rgba(106, 113, 151);
}

.box .btn-box > div > button:hover {
    border: 1px solid rgba(251, 128, 71, 0.7);
    background: rgba(251, 128, 71, 0.5);
</style>
