<style>
/* HEADER */
.header {
    background-color: #fff;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    padding: 0 20px;
    height: 60px;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 100;
    display: flex;
    align-items: center;
}

.header-logo {
    font-size: 26px;
    font-weight: bold;
    color: #1877f2;
    margin-right: auto;
}

.header-nav {
    display: flex;
    gap: 20px;
}

.header-nav-item {
    color: #65676b;
    font-weight: 500;
    padding: 8px 12px;
    border-radius: 4px;
    transition: background-color 0.2s;
}

.header-nav-item:hover {
    background-color: #f0f2f5;
}

.header-nav-item.active {
    color: #1877f2;
    position: relative;
}

.header-nav-item.active::after {
    content: '';
    position: absolute;
    bottom: -12px;
    left: 0;
    right: 0;
    height: 3px;
    background-color: #1877f2;
}

.header-nav-item.logout {
    background-color: #f0f2f5;
    margin-left: 10px;
}

.header-nav-item.logout:hover {
    background-color: #e4e6eb;
}
</style>

<header class="header">
        <a href="<?php echo APP_URL; ?>home" class="header-logo">NexMeet</a>
        
        <nav class="header-nav">
            <a href="<?php echo APP_URL; ?>home" class="header-nav-item active">
                <i class="fas fa-home"></i> <span>Inicio</span>
            </a>
            <a href="<?php echo APP_URL; ?>mensajes" class="header-nav-item">
                <i class="fas fa-comment"></i> <span>Mensajes</span>
            </a>
            <a href="<?php echo APP_URL; ?>perfil" class="header-nav-item">
                <i class="fas fa-user"></i> <span>Perfil</span>
            </a>
            <?php if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin'): ?>
            <a href="<?php echo APP_URL; ?>admin" class="header-nav-item">
                <i class="fas fa-cog"></i> <span>Admin</span>
            </a>
            <?php endif; ?>
            <a href="<?php echo APP_URL; ?>logout" class="header-nav-item logout">
                <i class="fas fa-sign-out-alt"></i> <span>Salir</span>
            </a>
        </nav>
    </header>