<div class="lg:w-64 flex-shrink-0">
    <div class="bg-white dark:bg-charcoal rounded-2xl shadow-sm border border-rose/10 dark:border-rose-dark/10 overflow-hidden lg:sticky lg:top-28" :class="sidebarOpen ? 'block' : 'hidden lg:block'">
        <div class="p-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-rose-light/50 dark:bg-rose-dark/20 text-rose-dark dark:text-rose' : 'text-charcoal dark:text-ivory hover:bg-rose-light/30 dark:hover:bg-rose-dark/10' }} transition-colors duration-200 text-sm">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.services.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.services.*') ? 'bg-rose-light/50 dark:bg-rose-dark/20 text-rose-dark dark:text-rose' : 'text-charcoal dark:text-ivory hover:bg-rose-light/30 dark:hover:bg-rose-dark/10' }} transition-colors duration-200 text-sm">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <span>Services</span>
            </a>
            <a href="{{ route('admin.staff.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.staff.*') ? 'bg-rose-light/50 dark:bg-rose-dark/20 text-rose-dark dark:text-rose' : 'text-charcoal dark:text-ivory hover:bg-rose-light/30 dark:hover:bg-rose-dark/10' }} transition-colors duration-200 text-sm">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                <span>Staff</span>
            </a>
            <a href="{{ route('admin.appointments.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.appointments.*') ? 'bg-rose-light/50 dark:bg-rose-dark/20 text-rose-dark dark:text-rose' : 'text-charcoal dark:text-ivory hover:bg-rose-light/30 dark:hover:bg-rose-dark/10' }} transition-colors duration-200 text-sm">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span>Appointments</span>
            </a>
            <a href="{{ route('admin.users.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.users.*') ? 'bg-rose-light/50 dark:bg-rose-dark/20 text-rose-dark dark:text-rose' : 'text-charcoal dark:text-ivory hover:bg-rose-light/30 dark:hover:bg-rose-dark/10' }} transition-colors duration-200 text-sm">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/></svg>
                <span>Users</span>
            </a>
            <a href="{{ route('admin.galleries.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.galleries.*') ? 'bg-rose-light/50 dark:bg-rose-dark/20 text-rose-dark dark:text-rose' : 'text-charcoal dark:text-ivory hover:bg-rose-light/30 dark:hover:bg-rose-dark/10' }} transition-colors duration-200 text-sm">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span>Gallery</span>
            </a>
            <a href="{{ route('admin.contacts.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.contacts.*') ? 'bg-rose-light/50 dark:bg-rose-dark/20 text-rose-dark dark:text-rose' : 'text-charcoal dark:text-ivory hover:bg-rose-light/30 dark:hover:bg-rose-dark/10' }} transition-colors duration-200 text-sm">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span>Messages</span>
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.testimonials.*') ? 'bg-rose-light/50 dark:bg-rose-dark/20 text-rose-dark dark:text-rose' : 'text-charcoal dark:text-ivory hover:bg-rose-light/30 dark:hover:bg-rose-dark/10' }} transition-colors duration-200 text-sm">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                <span>Testimonials</span>
            </a>
            <a href="{{ route('admin.packages.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.packages.*') ? 'bg-rose-light/50 dark:bg-rose-dark/20 text-rose-dark dark:text-rose' : 'text-charcoal dark:text-ivory hover:bg-rose-light/30 dark:hover:bg-rose-dark/10' }} transition-colors duration-200 text-sm">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                <span>Packages</span>
            </a>
            <form method="POST" action="{{ route('logout') }}" class="pt-2">
                @csrf
                <button type="submit" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-charcoal dark:text-ivory hover:bg-rose-light/30 dark:hover:bg-rose-dark/10 transition-colors duration-200 text-sm w-full">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</div>
