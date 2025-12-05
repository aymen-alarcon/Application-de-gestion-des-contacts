<?php include "../includes/header.php" ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Page d'accueil</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    nav {
      background-color: #333;
      color: white;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    nav .site-title {
      font-size: 1.5em;
      font-weight: bold;
    }
    nav .user-section {
      position: relative;
      cursor: pointer;
    }
    nav button, nav .user-name {
      background-color: #555;
      color: white;
      border: none;
      padding: 8px 15px;
      font-size: 1em;
      border-radius: 4px;
    }
    nav .menu {
      display: none;
      position: absolute;
      right: 0;
      top: 38px;
      background-color: #444;
      border-radius: 4px;
      overflow: hidden;
      box-shadow: 0 2px 5px rgba(0,0,0,0.5);
      z-index: 1000;
    }
    nav .menu a {
      display: block;
      padding: 10px 15px;
      color: white;
      text-decoration: none;
      white-space: nowrap;
    }
    nav .menu a:hover {
      background-color: #666;
    }
    main {
      text-align: center;
      padding: 50px 20px;
    }
    main h1 {
      font-size: 2em;
      margin-bottom: 30px;
    }
    main .btn {
      margin: 0 10px;
      padding: 12px 25px;
      font-size: 1em;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    main .btn.signup {
      background-color: #007bff;
      color: white;
    }
    main .btn.login {
      background-color: #28a745;
      color: white;
    }
  </style>
</head>
<body>
  <nav>
    <div class="site-title">Mon Site</div>
    <div class="user-section" id="userSection">
      <button id="loginBtn">Connexion</button>
      <div class="menu" id="userMenu">
        <a href="#">Profil</a>
        <a href="#">Contacts</a>
        <a href="#" id="logoutBtn">Déconnexion</a>
      </div>
    </div>
  </nav>
  <main>
    <h1>Bienvenue sur notre site !</h1>
    <button class="btn signup">S’inscrire</button>
    <button class="btn login">Se connecter</button>
  </main>

  <script>
    // Example logic to toggle user menu after login
    const userSection = document.getElementById('userSection');
    const loginBtn = document.getElementById('loginBtn');
    const userMenu = document.getElementById('userMenu');

    // Simulate logged out state initially
    let loggedIn = false;

    function updateNav() {
      if (loggedIn) {
        loginBtn.textContent = 'Jean Dupont ▼';
        userMenu.style.display = 'none';
      } else {
        loginBtn.textContent = 'Connexion';
        userMenu.style.display = 'none';
      }
    }

    loginBtn.addEventListener('click', () => {
      if (!loggedIn) {
        // Simulate login
        loggedIn = true;
        updateNav();
      } else {
        // Toggle menu
        userMenu.style.display = userMenu.style.display === 'block' ? 'none' : 'block';
      }
    });

    document.getElementById('logoutBtn').addEventListener('click', (e) => {
      e.preventDefault();
      loggedIn = false;
      updateNav();
    });

    // Close menu if clicked outside
    document.addEventListener('click', (event) => {
      if (!userSection.contains(event.target)) {
        userMenu.style.display = 'none';
      }
    });

    updateNav();
  </script>
</body>
</html>