<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> 
<style type="text/css">
	*{
		font-family: 'Poppins', sans-serif;;
	}
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-primary sticky-top">
  <div class="container">
    <a class="navbar-brand" type="button" onclick="goTo('index')">TODO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" type="button" onclick="goTo('index')">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" type="button" onclick="goTo('login')">Login</a>
            <a class="dropdown-item" type="button" onclick="goTo('register')">Register</a>
            <a class="dropdown-item" type="button" onclick="goTo('forgot-password')">Forgot Password</a>
            <!-- <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a> -->
          </div>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<script type="text/javascript" src="assets/js/redirect.js"></script>