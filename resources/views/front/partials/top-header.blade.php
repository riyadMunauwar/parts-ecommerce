<header class="flex justify-center gap-3 py-2 top-header-bg top-header-text">
    <h1>{{ config('setting')->top_header_message_text ?? '' }}</h1>
    <a href="{{ config('setting')->top_header_button_link ?? '' }}" class="top-header-button-text">{{ config('setting')->top_header_button_text ?? '' }}</a>
</header>