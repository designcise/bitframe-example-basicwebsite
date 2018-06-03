<nav id="mainNav">
    <ul>
        <li><a href="home"<?= ($this->hasEndpoint(['', 'home'])) ? ' class="active"' : ''; ?>>Home</a></li>
        <li><a href="about"<?= ($this->hasEndpoint('about')) ? ' class="active"' : ''; ?>>About</a></li>
    </ul>
</nav>