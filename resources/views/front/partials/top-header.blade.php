<header class="flex justify-center gap-3 py-2 top-header-bg top-header-text">
    <h1 class="text-xs md:text-base">{{ config('setting')->top_header_message_text ?? '' }}</h1>
    <a href="{{ config('setting')->top_header_button_link ?? '' }}" class="text-xs md:text-base top-header-button-text">{{ config('setting')->top_header_button_text ?? '' }}</a>
</header>