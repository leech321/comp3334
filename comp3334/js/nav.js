const createNav = () =>{
let nav = document.querySelector('.nav-bar');

nav.innerHTML = `<nav class="navbar navbar-light navbar-expand-lg bg-secondary">
<div class="container">
  <a class="navbar-brand" href="./index.html">
    Logo <!--img-->
  </a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="index.html" style="color: white;">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./forum.html">Forum</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./aboutus.html">About us</a>
      </li>
    </ul>     
  </div>

  <div id="search">
    <form>
      <input type="search" id="Searchbox" placeholder="Type something">
      <input type="submit" value="Search" class="btn btn-primary">
    </form>
  </div>

  <nav class="navbar navbar-light navbar-expand-lg bg-secondary">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>

        </ul>     
      </div>
</div>

</nav>
</div>
</nav>`;

}

createNav();