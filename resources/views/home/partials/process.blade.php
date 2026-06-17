{{-- PROCESS SECTION - Precision workflow with subtle orange accents --}}
<section id="process" class="pa-section bg-[#fffaf4] overflow-hidden">
    <span class="pa-section-line"></span>
    <div class="pa-subtle-mark left-[-5rem] top-20 hidden lg:block"></div>
    <div class="pa-container relative">
        <div class="grid lg:grid-cols-[.9fr_1.1fr] gap-8 lg:gap-16 items-end mb-12 lg:mb-16">
            <div class="reveal-left">
                <span class="pa-kicker">{{ __('frontend.process_badge') }}</span>
                <h2 class="pa-title mt-5 text-5xl md:text-7xl font-black leading-[.86]">{{ __('frontend.process_title') }}<span>.</span></h2>
            </div>
            <p class="reveal-right text-zinc-600 text-lg md:text-xl leading-relaxed max-w-3xl" data-delay="100">{{ __('frontend.process_subtitle') }}</p>
        </div>

        <div class="grid lg:grid-cols-3 border-y border-zinc-200 bg-white/104 backdrop-blur-sm shadow-xl shadow-zinc-950/5">
            @php
            $steps = [
                ['title' => __('frontend.process_steps.0.title'), 'desc' => __('frontend.process_steps.0.desc'), 'icon' => 'message-circle'],
                ['title' => __('frontend.process_steps.1.title'), 'desc' => __('frontend.process_steps.1.desc'), 'icon' => 'calendar-check'],
                ['title' => __('frontend.process_steps.2.title'), 'desc' => __('frontend.process_steps.2.desc'), 'icon' => 'scan-search'],
                ['title' => __('frontend.process_steps.3.title'), 'desc' => __('frontend.process_steps.3.desc'), 'icon' => 'wrench'],
                ['title' => __('frontend.process_steps.4.title'), 'desc' => __('frontend.process_steps.4.desc'), 'icon' => 'shield-check'],
                ['title' => __('frontend.process_steps.5.title'), 'desc' => __('frontend.process_steps.5.desc'), 'icon' => 'check-circle'],
            ];
            @endphp
            @foreach($steps as $i => $step)
            <div class="relative p-6 md:p-8 lg:p-9 border-b lg:border-b-0 lg:border-r last:border-r-0 border-zinc-200 reveal group" data-delay="{{ $i * 120 }}">
                <div class="absolute left-0 top-0 h-[3px] w-0 bg-orange-500 group-hover:w-full transition-all duration-500"></div>
                <div class="flex items-center justify-between mb-14">
                    <span class="text-[11px] font-black uppercase tracking-[.24em] text-zinc-400">Step</span>
                    <span class="text-6xl font-black tracking-[-.08em] text-zinc-100 group-hover:text-orange-100 transition-colors">0{{ $i + 1 }}</span>
                </div>
                <div class="w-14 h-14 bg-white border border-zinc-200 text-orange-600 flex items-center justify-center mb-7 group-hover:bg-orange-500 group-hover:text-white group-hover:border-orange-500 transition-colors shadow-sm">
                    <i data-lucide="{{ $step['icon'] }}" class="w-7 h-7"></i>
                </div>
                <h3 class="text-2xl md:text-3xl font-black uppercase tracking-[-.055em] text-zinc-950 leading-[.92] mb-4">{{ $step['title'] }}</h3>
                <p class="text-zinc-600 text-sm leading-relaxed">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>

        <div class="mt-10 grid md:grid-cols-3 gap-4 reveal">
            @foreach([
                ['label' => 'Transparent Estimate', 'value' => 'No Hidden Cost'],
                ['label' => 'Paint Standard', 'value' => 'Factory Finish'],
                ['label' => 'After Service', 'value' => 'Warranty Support'],
            ] as $item)
            <div class="bg-white border border-zinc-200 p-5 flex items-center justify-between gap-4 shadow-sm">
                <span class="text-[10px] font-black uppercase tracking-[.22em] text-zinc-500">{{ $item['label'] }}</span>
                <span class="font-black text-zinc-950 uppercase tracking-[-.03em]">{{ $item['value'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>
