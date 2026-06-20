<x-layouts.app
    title="Tentang Kami | PT Gagasan Gemilang Indonesia"
    description="Kenali GGI lebih dalam — profil perusahaan, visi misi, dan tim ahli kami yang berpengalaman lebih dari 15 tahun di bidang pengembangan ekonomi lokal, UMKM, BUMDes, dan ekonomi kreatif."
    canonical="{{ url('/tentang-kami') }}"
>
    {{-- <x-page-hero
        title="Tentang <span class='text-gradient-aurora'>Kami</span>"
        subtitle="Kenali lebih dalam siapa GGI, nilai-nilai yang kami pegang, dan tim ahli yang siap mendampingi Anda."
        :breadcrumbs="[['label' => 'Tentang Kami']]"
    /> --}}

    <x-about />
    <x-visi-misi />
    <x-team />
    <x-approach />
</x-layouts.app>
