<template>
    <!--Profile Dropdown -->
    <div class="dropdown dropdown-end">
        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
                <img
                    src="../../../../public/images/account.png"
                    alt="user logo"
                />
            </div>
        </label>
        <ul
            tabindex="0"
            class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-200 rounded-box w-52"
        >
            <div v-if="$page.props.auth.user">
                <li>
                    <Link href="/profile" class="justify-between">
                        Profile
                    </Link>
                </li>
                <li>
                    <Link :href="route('logout')" method="post" as="button">
                        Log Out
                    </Link>
                </li>
            </div>
            <div v-else>
                <li><Link href="/login">Login</Link></li>
                <li><Link href="/register">Register</Link></li>
            </div>
        </ul>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
