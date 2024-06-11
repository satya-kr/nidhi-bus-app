<nav>
    <div class="logo">
        <h1>MyBus App</h1>
    </div>
    <div class="nav-menu">
        <ul>
            <?php if($userRole === 'admin'): ?>
            <li><a class="nav-link" href="#">Manage Bus</a></li>
            <li><a class="nav-link" href="#">Manage Routes</a></li>
            <li><a class="nav-link" href="#">Manage User</a></li>
            <?php endif; ?>     
        </ul>
        <ul>
            <?php if($isAuth): ?>
                <li><a class="nav-link" href="#">Dashboard</a></li>
                <li><a class="nav-link" href="#">Profile</a></li>
                <li><a class="nav-link" href="../logout.php">Logout</a></li>
            <?php else: ?>
                <li><a class="nav-link" href="login.php">Login</a></li>
                <li><a class="nav-link" href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>