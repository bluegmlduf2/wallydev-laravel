@props(['country'])

@switch($country)
    @case('ko')
        <svg width="30px" height="30px" viewBox="0 0 64 64" aria-hidden="true" role="img" class="iconify iconify--emojione"
            preserveAspectRatio="xMidYMid meet">
            <circle cx="32" cy="32" r="30" fill="#f5f5f5">
            </circle>
            <path
                d="M23.4 33.7c2.8 1.9 6.7 1.1 8.6-1.7c1.9-2.8 5.7-3.6 8.6-1.7c2.7 1.8 3.5 5.3 2 8c3.3-5.6 1.8-12.9-3.8-16.6c-5.7-3.8-13.4-2.3-17.2 3.4c-.1.2-.2.4-.3.5c-1.4 2.9-.5 6.3 2.1 8.1"
                fill="#ed4c5c">
            </path>
            <path d="M42.3 38.9c.1-.2.2-.4.3-.5c-.1.1-.2.3-.3.5" fill="#003478">
            </path>
            <path
                d="M40.6 30.3c-2.8-1.9-6.7-1.1-8.6 1.7c-1.9 2.8-5.7 3.6-8.6 1.7c-2.7-1.8-3.5-5.3-2-8c-3.4 5.6-1.8 12.9 3.8 16.6c5.7 3.8 13.4 2.3 17.2-3.4c.1-.2.2-.4.3-.5c1.4-2.9.5-6.3-2.1-8.1"
                fill="#428bc1">
            </path>
            <g fill="#3e4347">
                <path d="M7.8 23.3L14.7 13l-.7-.5l-.7-.4l-6.9 10.3l.7.4z">
                </path>
                <path d="M9.7 24.6l.7.4l6.8-10.3l-.6-.4l-.7-.5L9 24.1z">
                </path>
                <path d="M18.4 15.5l-6.8 10.3l.7.5l.7.4l6.8-10.3l-.7-.4z">
                </path>
                <path d="M48.5 42.5l.7.5l3.2-4.8l-.7-.5l-.7-.4l-3.2 4.8z">
                </path>
                <path d="M56.2 40.7L53 45.5l.7.5l.7.4l3.2-4.8l-.7-.4z">
                </path>
                <path d="M51.8 44.7l3.2-4.8l-.7-.5l-.7-.4l-3.2 4.8l.7.4z">
                </path>
                <path d="M48.1 43.2l-.7-.4l-3.2 4.8l.7.4l.7.5l3.2-4.8z">
                </path>
                <path d="M50.6 44.9l-.6-.4l-3.2 4.8l.6.4l.7.5l3.2-4.8z">
                </path>
                <path d="M52.5 46.2L49.3 51l.7.5l.7.4l3.2-4.8l-.7-.5z">
                </path>
                <path d="M7.1 41.2l-.7.4l6.9 10.3l.7-.4l.7-.5l-6.9-10.3z">
                </path>
                <path d="M13.4 44.9l-.7.5l3.2 4.8l.7-.5l.6-.4l-3.2-4.8z">
                </path>
                <path d="M12.3 37.7l-.7.5l6.8 10.3l.7-.5l.7-.4L13 37.3z">
                </path>
                <path d="M9 39.9l3.2 4.8l.7-.5l.7-.4l-3.2-4.8l-.7.4z">
                </path>
                <path d="M53.2 17.4l.7-.5l-3.2-4.8l-.7.4l-.7.5l3.2 4.8z">
                </path>
                <path d="M48.1 20.8l.7-.5l-3.2-4.8l-.7.5l-.7.4l3.2 4.8z">
                </path>
                <path d="M53 18.5l3.2 4.8l.7-.5l.7-.4l-3.2-4.8l-.7.4z">
                </path>
                <path d="M54.3 24.6l.7-.5l-6.9-10.3l-.7.5l-.6.4L53.6 25z">
                </path>
                <path d="M51.7 26.3l.7-.5l-3.2-4.8l-.7.5l-.7.4l3.2 4.8z">
                </path>
            </g>
        </svg>
    @break

    @case('ja')
        <svg width="30px" height="30px" viewBox="0 0 64 64" aria-hidden="true" role="img"
            class="iconify iconify--emojione" preserveAspectRatio="xMidYMid meet">
            <circle cx="32" cy="32" r="30" fill="#f5f5f5"></circle>
            <circle cx="32" cy="32" r="12" fill="#ed4c5c"></circle>
        </svg>
    @break

    @default
        <svg width="30px" height="30px" viewBox="0 0 64 64"aria-hidden="true" role="img"
            class="iconify iconify--emojione" preserveAspectRatio="xMidYMid meet">
            <path d="M48 6.6C43.3 3.7 37.9 2 32 2v4.6h16" fill="#ed4c5c">
            </path>
            <path d="M32 11.2h21.6C51.9 9.5 50 7.9 48 6.6H32v4.6z" fill="#ffffff">
            </path>
            <path d="M32 15.8h25.3c-1.1-1.7-2.3-3.2-3.6-4.6H32v4.6z" fill="#ed4c5c">
            </path>
            <path d="M32 20.4h27.7c-.7-1.6-1.5-3.2-2.4-4.6H32v4.6" fill="#ffffff">
            </path>
            <path d="M32 25h29.2c-.4-1.6-.9-3.1-1.5-4.6H32V25z" fill="#ed4c5c">
            </path>
            <path d="M32 29.7h29.9c-.1-1.6-.4-3.1-.7-4.6H32v4.6" fill="#ffffff">
            </path>
            <path d="M61.9 29.7H32V32H2c0 .8 0 1.5.1 2.3h59.8c.1-.8.1-1.5.1-2.3c0-.8 0-1.6-.1-2.3" fill="#ed4c5c">
            </path>
            <path d="M2.8 38.9h58.4c.4-1.5.6-3 .7-4.6H2.1c.1 1.5.3 3.1.7 4.6" fill="#ffffff">
            </path>
            <path d="M4.3 43.5h55.4c.6-1.5 1.1-3 1.5-4.6H2.8c.4 1.6.9 3.1 1.5 4.6" fill="#ed4c5c">
            </path>
            <path d="M6.7 48.1h50.6c.9-1.5 1.7-3 2.4-4.6H4.3c.7 1.6 1.5 3.1 2.4 4.6" fill="#ffffff">
            </path>
            <path d="M10.3 52.7h43.4c1.3-1.4 2.6-3 3.6-4.6H6.7c1 1.7 2.3 3.2 3.6 4.6" fill="#ed4c5c">
            </path>
            <path d="M15.9 57.3h32.2c2.1-1.3 3.9-2.9 5.6-4.6H10.3c1.7 1.8 3.6 3.3 5.6 4.6" fill="#ffffff">
            </path>
            <path d="M32 62c5.9 0 11.4-1.7 16.1-4.7H15.9c4.7 3 10.2 4.7 16.1 4.7" fill="#ed4c5c">
            </path>
            <path
                d="M16 6.6c-2.1 1.3-4 2.9-5.7 4.6c-1.4 1.4-2.6 3-3.6 4.6c-.9 1.5-1.8 3-2.4 4.6c-.6 1.5-1.1 3-1.5 4.6c-.4 1.5-.6 3-.7 4.6c-.1.8-.1 1.6-.1 2.4h30V2c-5.9 0-11.3 1.7-16 4.6"
                fill="#428bc1">
            </path>
            <g fill="#ffffff">
                <path d="M25 3l.5 1.5H27l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                </path>
                <path d="M29 9l.5 1.5H31l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                </path>
                <path d="M21 9l.5 1.5H23l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                </path>
                <path d="M25 15l.5 1.5H27l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                </path>
                <path d="M17 15l.5 1.5H19l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                </path>
                <path d="M9 15l.5 1.5H11l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                </path>
                <path d="M29 21l.5 1.5H31l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                </path>
                <path d="M21 21l.5 1.5H23l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                </path>
                <path d="M13 21l.5 1.5H15l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                </path>
                <path d="M25 27l.5 1.5H27l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                </path>
                <path d="M17 27l.5 1.5H19l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                </path>
                <path d="M9 27l.5 1.5H11l-1.2 1l.4 1.5l-1.2-.9l-1.2.9l.4-1.5l-1.2-1h1.5z">
                </path>
                <path d="M11.8 13l1.2-.9l1.2.9l-.5-1.5l1.2-1h-1.5L13 9l-.5 1.5h-1.4l1.2.9l-.5 1.6">
                </path>
                <path d="M3.8 25l1.2-.9l1.2.9l-.5-1.5l1.2-1H5.5L5 21l-.5 1.5h-1c0 .1-.1.2-.1.3l.8.6l-.4 1.6">
                </path>
            </g>
        </svg>
@endswitch
