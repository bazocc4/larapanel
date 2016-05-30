<li class="xn-title">Main Menu</li>
<li id="menu-settings">
    <a href="{{ route('admin.settings.index') }}"><span class="fa fa-cogs"></span> <span class="xn-text">Settings</span></a>
</li>
<li class="xn-openable">
    <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Membership</span></a>
    <ul>
        <li id="menu-users">
            <a href="{{ route('admin.users.index') }}"><span class="fa fa-key"></span> <span class="xn-text">User Accounts</span></a>
        </li>
<!--
        <li id="menu-roles">
            <a href="#"><span class="fa fa-sitemap"></span> <span class="xn-text">User Roles</span></a>
        </li>
-->
    </ul>
</li>
<li id="menu-media-library">
    <a href="#"><span class="fa fa-picture-o"></span> <span class="xn-text">Media Library</span></a>
</li>

<li class="xn-title">Database</li>
<li class="xn-openable">
    <a href="#"><span class="fa fa-home"></span> <span class="xn-text">Home</span></a>
    <ul>
        <li id="menu-slideshow">
            <a href="#"><span class="fa fa-film"></span> <span class="xn-text">Slideshow</span></a>
        </li>
    </ul>
</li>
<li class="xn-openable">
    <a href="#"><span class="fa fa-wrench"></span> <span class="xn-text">Others</span></a>
    <ul>
        <li id="menu-backup">
            <a href="#"><span class="fa fa-save"></span> <span class="xn-text">Backup Data</span></a>
        </li>
    </ul>
</li>