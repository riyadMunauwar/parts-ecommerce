<aside x-cloak :class="isNavigationOpen ? 'visible translate-x-0' : 'invisible translate-x-full' " class="transition-all fixed z-40 top-0 bottom-0 right-0  md:translate-x-0 md:visible md:left-0 w-5/6 md:w-52 bg-gray-900 text-white aside-scroll-bar overflow-y-auto">
    
    <div x-data="{isOpen: false}">
        <a href="{{ URL('/') }}" target="_blank" @click="isOpen = !isOpen" class="cursor-pointer flex items-center py-2 px-3 hover:bg-gray-800" >
            <span class="mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </span>

            <span>
                Store Front
            </span>
        </a>
    </div>


    <div x-data="{isOpen: false}">
        <a href="{{ route('dashboard') }}" @click="isOpen = !isOpen" class="cursor-pointer flex items-center py-2 px-3 hover:bg-gray-800" >
            <span class="mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
            </span>

            <span>
                Dashboard
            </span>
        </a>
    </div>



    <div x-data="{isOpen: false}">
        <a @click="isOpen = !isOpen" class="cursor-pointer flex items-center py-2 px-3 hover:bg-gray-800" >
            <span class="mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
            </span>

            <span>
                Orders
            </span>

            <span x-show="!isOpen" class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </span>

            <span x-show="isOpen" class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                </svg>
            </span>
        </a>


        <div x-transition.duration.150ms x-show="isOpen" class="pl-7">
            <a href="{{ route('orders.list') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                New order
            </a>
            <a href="{{ route('orders.new-list') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Order list
            </a>
        </div>
    </div>


    <div x-data="{isOpen: false}">
        <a @click="isOpen = !isOpen" class="cursor-pointer flex items-center py-2 px-3 hover:bg-gray-800" >
            <span class="mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                </svg>
            </span>

            <span>
                Products
            </span>

            <span x-show="!isOpen" class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </span>

            <span x-show="isOpen" class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                </svg>
            </span>
        </a>


        <div x-transition.duration.150ms x-show="isOpen" class="pl-7">
            <a href="{{ route('products.create') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Add new
            </a>
            <a href="{{ route('products.list') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Product list
            </a>
        </div>
    </div>


    <div x-data="{isOpen: false}">
        <a @click="isOpen = !isOpen" class="cursor-pointer flex items-center py-2 px-3 hover:bg-gray-800" >
            <span class="mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
            </span>

            <span>
                Categories
            </span>

            <span x-show="!isOpen" class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </span>

            <span x-show="isOpen" class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                </svg>
            </span>
        </a>


        <div x-transition.duration.150ms x-show="isOpen" class="pl-7">
            <a href="{{ route('category.create') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Add new
            </a>
            <a href="{{ route('category.list') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Category list
            </a>
        </div>
    </div>
    



    <div x-data="{isOpen: false}">
        <a @click="isOpen = !isOpen" class="cursor-pointer flex items-center py-2 px-3 hover:bg-gray-800" >
            <span class="mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                </svg>
            </span>

            <span>
                Customers
            </span>

            <span x-show="!isOpen" class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </span>

            <span x-show="isOpen" class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                </svg>
            </span>
        </a>


        <div x-transition.duration.150ms x-show="isOpen" class="pl-7">
            <a href="{{ route('customer') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Customer List
            </a>
            <a href="{{ route('wholesaler') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Wholesaler List 
            </a>
            <a href="{{ route('subscriber-list') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Subscriber List
            </a>
            <a href="{{ route('contact-form-list') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Contact Form List
            </a>
        </div>
    </div>


    <div x-data="{isOpen: false}">
        <a @click="isOpen = !isOpen" class="cursor-pointer flex items-center py-2 px-3 hover:bg-gray-800" >
            <span class="mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                </svg>
            </span>

            <span>
                Reports
            </span>

            <span x-show="!isOpen" class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </span>

            <span x-show="isOpen" class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                </svg>
            </span>
        </a>


        <div x-transition.duration.150ms x-show="isOpen" class="pl-7">
            <a href="{{ route('reports.sales') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Sales
            </a>
            <a href="{{ route('reports.purchases') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Purchases
            </a>
            <a href="{{ route('reports.stocks') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Stocks
            </a>
        </div>
    </div>


    <div x-data="{isOpen: false}">
        <a @click="isOpen = !isOpen" class="cursor-pointer flex items-center py-2 px-3 hover:bg-gray-800" >
            <span class="mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                </svg>
            </span>

            <span>
                Store
            </span>

            <span x-show="!isOpen" class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </span>

            <span x-show="isOpen" class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                </svg>
            </span>
        </a>


        <div x-transition.duration.150ms x-show="isOpen" class="pl-7">
            <a href="{{ route('color') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Color
            </a>
            <a href="{{ route('header') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Header
            </a>
            <a href="{{ route('menu') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Menu
            </a>
            <a href="{{ route('social-link') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Social links
            </a>
            <a href="{{ route('caurosel') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Caurosel
            </a>
            <a href="{{ route('feature-box') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Feature Box
            </a>
            <a href="{{ route('page') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Pages
            </a>
            <a href="{{ route('footer') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Footer
            </a>
        </div>
    </div>

    

    <div x-data="{isOpen: false}">
        <a @click="isOpen = !isOpen" class="cursor-pointer flex items-center py-2 px-3 hover:bg-gray-800" >
            <span class="mr-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </span>

            <span>
                Settings
            </span>

            <span x-show="!isOpen" class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </span>

            <span x-show="isOpen" class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                </svg>
            </span>
        </a>


        <div x-transition.duration.150ms x-show="isOpen" class="pl-7">
            <a href="{{ route('admins.list') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Admins
            </a>
            <a class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Payment
            </a>
            <a class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Shipper
            </a>
            <a class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Area
            </a>
            <a href="{{ route('vat') }}"  class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Vat
            </a>
            <a href="{{ route('discount') }}"  class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Discount
            </a>
            <a href="{{ route('coupon') }}"  class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                Coupon
            </a>
            <a href="{{ route('setting') }}" class="border-l cursor-pointer flex items-center text-sm py-1 px-3 hover:bg-gray-700" >
                General
            </a>
        </div>
    </div>


</aside>