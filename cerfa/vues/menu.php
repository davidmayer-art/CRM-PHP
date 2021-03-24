

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">A.M.D.Y.</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php
      if (!estConnecte())
      {
        ?>
            <li class="nav-item active">  
              <a class="nav-link" href="connecter.php" >Se connecter</a> 
            </li>
        <?php
      } 
      if (!estAdministrateurConnecte() && estConnecte())
      {
        ?>
      <li class="nav-item active">
        <a class="nav-link" href="lister_F.php">Liste donnateurs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="lister.php">Liste cerfa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="import_csv.php">Import Donnateurs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php">S'inscrire</a>
      </li>
      
     <li class="nav-item">  
        <a class="nav-link " href="deconnecter.php" >Se deconnecter</a> 
      </li>   
      <?php } 

      if (estConnecte() && estAdministrateurConnecte())
{
  ?>
      <li class="nav-item active">
        <a class="nav-link" href="lister_F.php">Liste donnateur</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="lister.php">Liste cerfa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="import_csv.php">Import Donnateurs</a>
      </li>
     <li class="nav-item">  
        <a class="nav-link " href="deconnecter.php" >Se deconnecter</a> 
      </li>    
  <?php
}
?>
    </ul>
  </div>
</nav>


