<?php

function get_user()
{
    return session()->get('user');
}

function get_access()
{
    $user = get_user();
    return $user->isSuperAdmin() ? 'super' : ($user->isAdmin() ? 'admin' : 'user');
}

function get_role()
{
    $user = get_user();
    return $user->role->code;
}

function has_access($arguments)
{
    $access = get_access();
    return in_array($access, $arguments);
}

function has_role($roles)
{
    $role = get_role();
    return in_array($role, $roles);
}
