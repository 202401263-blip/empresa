{{-- Componente de bloque del sidebar --}}
@props(['title', 'icon', 'items', 'expanded' => false])

<div class="sidebar-block mb-4">
    <div class="block-header px-3 py-2 d-flex align-items-center justify-content-between cursor-pointer" 
         data-bs-toggle="collapse" 
         data-bs-target="#block-{{ \Str::slug($title) }}"
         role="button"
         aria-expanded="{{ $expanded ? 'true' : 'false' }}">
        <div class="d-flex align-items-center gap-2">
            <i class="fas {{ $icon }} block-icon"></i>
            <span class="text-uppercase text-white fw-semibold small">{{ $title }}</span>
        </div>
        <i class="fas fa-chevron-down block-chevron" style="font-size: 0.7rem;"></i>
    </div>
    
    <div class="collapse {{ $expanded ? 'show' : '' }}" id="block-{{ \Str::slug($title) }}">
        <ul class="nav flex-column block-items">
            @foreach($items as $item)
                <li class="nav-item">
                    <a href="{{ $item['url'] }}" 
                       class="nav-link {{ $item['active'] ? 'active-link' : '' }}"
                       title="{{ $item['label'] }}">
                        <i class="fas {{ $item['icon'] }}"></i>
                        <span>{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<style scoped>
.sidebar-block {
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.03);
    overflow: hidden;
    transition: all 0.3s ease;
}

.sidebar-block:hover {
    background: rgba(255, 255, 255, 0.06);
}

.block-header {
    cursor: pointer;
    user-select: none;
    transition: all 0.2s ease;
}

.block-header:hover {
    background: rgba(255, 255, 255, 0.08);
}

.block-icon {
    font-size: 1rem;
    width: 20px;
    text-align: center;
    color: #0d6efd;
}

.block-chevron {
    transition: transform 0.3s ease;
}

.block-header[aria-expanded="true"] .block-chevron {
    transform: rotate(-180deg);
}

.block-items .nav-link {
    padding: 10px 20px 10px 45px !important;
    font-size: 0.9rem;
    color: #adb5bd;
    transition: all 0.2s ease;
}

.block-items .nav-link:hover {
    background: rgba(13, 110, 253, 0.1);
    color: #ffffff;
    padding-left: 48px !important;
}

.block-items .nav-link i {
    width: 20px;
    margin-right: 10px;
}
</style>
