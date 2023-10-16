<div class="container right-panel-active">
  <!-- Sign Up -->
  <div class="container__form container--signup">
    <form action="{{ route('shop.checkRegister') }}" class="form" id="form1" method="POST">
      <h2 class="form__title">Đăng ký</h2>
      @csrf

      <input type="email" placeholder="Email" class="input" name="email" id="email" />
      <input type="text" placeholder="tên" class="input" name="name" id="name" />
      <input type="phone" placeholder="sdt" class="input" name="phone" id="phone" />
      <input type="text" placeholder="địa chỉ" class="input" name="address" id="address" />
      <input type="password" placeholder="mật khẩu" class="input" name="password" id="password" />
      <input type="password" placeholder="nhập lại mật khẩu" class="input" name="psw_repeat" id="psw_repeat" />
      <button type="submit" class="btn">Đăng ký</button>

      <body>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.1/dist/sweetalert2.min.js"></script>
        @if (session('successMessage'))
        <script>
          Swal.fire({
            title: "<h6>{{ session('successMessage') }}</h6>",
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
            width: "300px"
          });
        </script>
        @elseif(session('successMessage1'))
        <script>
          Swal.fire({
            title: "<h6>{{ session('successMessage1') }}</h6>",
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
            width: "300px"
          });
        </script>
        @elseif(session('successMessage2'))
        <script>
          Swal.fire({
            title: "<h6>{{ session('successMessage2') }}</h6>",
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
            width: "300px"
          });
        </script>
        @elseif(session('successMessage3'))
        <script>
          Swal.fire({
            title: "<h6>{{ session('successMessage3') }}</h6>",
            icon: "success",
            showConfirmButton: false,
            timer: 2000,
            width: "300px"
          });
        </script>
        @endif


      </body>
    </form>
  </div>


  <!-- Overlay -->
  <div class="container__overlay">
    <div class="overlay">
      <div class="overlay__panel overlay--left">
        <button class="btn" id="signIn">
          <a href="http://127.0.0.1:8000/login-index" class="login-link">💞 Đăng nhập 💞</a>
        </button>
      </div>
    </div>
  </div>
</div>
<style>
  :root {
    /* COLORS */
    --white: #e9e9e9;
    --gray: #333;
    --blue: #0367a6;
    --lightblue: #008997;

    /* RADII */
    --button-radius: 0.7rem;

    /* SIZES */
    --max-width: 758px;
    --max-height: 420px;

    font-size: 16px;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
      Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
  }

  body {
    align-items: center;
    background-color: var(--white);
    background: url("https://khostock.net/wp-content/uploads/2021/01/Kho-Stock-KS1083.jpg");
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    display: grid;
    height: 100vh;
    place-items: center;
  }

  .form__title {
    font-weight: 300;
    margin: 0;
    margin-bottom: 1.25rem;
  }

  .link {
    color: var(--gray);
    font-size: 0.9rem;
    margin: 1.5rem 0;
    text-decoration: none;
  }

  .container {
    background-color: var(--white);
    border-radius: var(--button-radius);
    box-shadow: 0 0.9rem 1.7rem rgba(0, 0, 0, 0.25),
      0 0.7rem 0.7rem rgba(0, 0, 0, 0.22);
    height: var(--max-height);
    max-width: var(--max-width);
    overflow: hidden;
    position: relative;
    width: 100%;
  }

  .container__form {
    height: 100%;
    position: absolute;
    top: 0;
    transition: all 0.6s ease-in-out;
  }

  .container--signin {
    left: 0;
    width: 50%;
    z-index: 2;
  }

  .container.right-panel-active .container--signin {
    transform: translateX(100%);
  }

  .container--signup {
    left: 0;
    opacity: 0;
    width: 50%;
    z-index: 1;
  }

  .container.right-panel-active .container--signup {
    animation: show 0.6s;
    opacity: 1;
    transform: translateX(100%);
    z-index: 5;
  }

  .container__overlay {
    height: 100%;
    left: 50%;
    overflow: hidden;
    position: absolute;
    top: 0;
    transition: transform 0.6s ease-in-out;
    width: 50%;
    z-index: 100;
  }

  .container.right-panel-active .container__overlay {
    transform: translateX(-100%);
  }

  .overlay {
    background-color: var(--lightblue);
    background: url("https://xuconcept.com/wp-content/uploads/2020/12/chup-anh-quan-ao-dep.jpg");
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%;
    left: -100%;
    position: relative;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
    width: 200%;
  }

  .container.right-panel-active .overlay {
    transform: translateX(50%);
  }

  .overlay__panel {
    align-items: center;
    display: flex;
    flex-direction: column;
    height: 100%;
    justify-content: center;
    position: absolute;
    text-align: center;
    top: 0;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
    width: 50%;
  }

  .overlay--left {
    transform: translateX(-20%);
  }

  .container.right-panel-active .overlay--left {
    transform: translateX(0);
  }

  .overlay--right {
    right: 0;
    transform: translateX(0);
  }

  .container.right-panel-active .overlay--right {
    transform: translateX(20%);
  }

  .btn {
    background-color: var(--blue);
    background-image: linear-gradient(90deg, var(--blue) 0%, var(--lightblue) 74%);
    border-radius: 20px;
    border: 1px solid var(--blue);
    color: var(--white);
    cursor: pointer;
    font-size: 0.8rem;
    font-weight: bold;
    letter-spacing: 0.1rem;
    padding: 0.9rem 4rem;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
  }

  .form>.btn {
    margin-top: 1.5rem;
  }

  .btn:active {
    transform: scale(0.95);
  }

  .btn:focus {
    outline: none;
  }

  .form {
    background-color: var(--white);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 3rem;
    height: 100%;
    text-align: center;
  }

  .input {
    background-color: #fff;
    border: none;
    padding: 0.4rem 0.4rem;
    margin: 0.5rem 0;
    width: 100%;
  }

  @keyframes show {

    0%,
    49.99% {
      opacity: 0;
      z-index: 1;
    }

    50%,
    100% {
      opacity: 1;
      z-index: 5;
    }
  }
</style>