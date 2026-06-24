<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'CRUD Operations'</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
            <img src="../images/northhub.svg" id="logo"></img>
            <button class="navbarbuttons" onclick="showSection('create')"> Create </button>
            <button class="navbarbuttons" > Read </button>
            <button class="navbarbuttons" > Update </button>
            <button class="navbarbuttons" > Delete </button>
    </nav>
    <section id="home" class="homecontent"> 
        <h1 class="splash">Welcome to Student Management System</h1>
        <h2 class="splash">A Project in Integrative Programming Technologies</h2>
    </section>
    
    <section id="create" class="content">
        <h1 class="contenttitle"> Insert New Student </h1>

    <div class="form-group">
        <input id="surname" placeholder="Surname">
        <input id="name" placeholder="Name">
        <input id="middlename" placeholder="Middle Name">
        <input id="address" placeholder="Address">
        <input id="contact" placeholder="Contact">
    </div>

    <button onclick="addStudent()">Save</button>
</section>
<section id="read" class="content">
      <h2>Student Records</h2>

    <table id="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</section>
 

</div>

<script src="script.js"></script>
</body>
</html><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'CRUD Operations'</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
            <img src="../images/northhub.svg" id="logo"></img>
            <button class="navbarbuttons" onclick="showSection('create')"> Create </button>
            <button class="navbarbuttons" > Read </button>
            <button class="navbarbuttons" > Update </button>
            <button class="navbarbuttons" > Delete </button>
    </nav>
    <section id="home" class="homecontent"> 
        <h1 class="splash">Welcome to Student Management System</h1>
        <h2 class="splash">A Project in Integrative Programming Technologies</h2>
    </section>
    
    <section id="create" class="content">
        <h1 class="contenttitle"> Insert New Student </h1>

    <div class="form-group">
        <input id="surname" placeholder="Surname">
        <input id="name" placeholder="Name">
        <input id="middlename" placeholder="Middle Name">
        <input id="address" placeholder="Address">
        <input id="contact" placeholder="Contact">
    </div>

    <button onclick="addStudent()">Save</button>
</section>
<section id="read" class="content">
      <h2>Student Records</h2>

    <table id="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</section>
 

</div>

<script src="script.js"></script>
</body>
</html>
