@extends('layouts.legacynetwork')
@section('page-title', 'Legacy Network | Benefits')
@section('content')
    <div class="public_page_container benefits_page_container">
        @include('public_pages_v2/partials/banner')

        <section class='elite_health_challenge_benefits_section'>
            <div class='container'>
                <div class='container--item'>
                    <div class='section_header'>
                        <h3 class='section_title'>Elite health challenge benefits</h3>
                    </div>
                    <div class='details_container'>
                        <div class='details_container--item'>
                            <p>By combining use of the clinically-proven Elite Health Challenge
                                products with moderate daily exercise (walking) and a healthy
                                Mediterranean-style diet, you may begin to see improvements in
                                the following areas: </p>
                        </div>
                        <div class="details_container--item">
                            <ul style="text-align: left;">
                                <li>
                                    <p>Microbiome (gut) health</p>
                                </li>
                                <li>
                                    <p>Weight loss/management</p>
                                </li>
                                <li>
                                    <p>Energy & sports fitness</p>
                                </li>
                                <li>
                                    <p>Mental focus and clarity</p>
                                </li>
                                <li>
                                    <p>Healthy blood pressure, blood sugar, and cholesterol levels</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class='container--item'></div>
            </div>
        </section>

        <section class='microbiome_section' id='microbiome'>
            <div class='container'>
                <div class='container--item'>
                    <div class='section_header'>
                        <h3 class='section_title_secondary'>Microbiome (Gut) health & Weight management</h3>
                    </div>

                    <div class='sac'>
                        <div class='sac--item'>
                            <img src='{{ asset('images/biome-dtx.png') }}' alt='Biome DTX'>
                        </div>
                        <div class='sac--item details'>
                            <header>Biome DTX</header>
                            <p>Biome DTX cleanses and balances the microbiome by eliminating toxins
                                and heavy metals. Its l-glutamine-rich formulation also supports healing of
                                the gut lining to stop the flow of endotoxins that damage and trigger
                                inflammation to vital body systems. This purifying drink is a gateway to a
                                new beginning of Elite Health.</p>
                        </div>
                    </div>

                    <div class='sac gray'>
                        <div class='sac--item details'>
                            <header>Biome Shake</header>
                            <p>Biome Shake is a purifying meal replacement shake high in vegetable
                                protein with a blend of antioxidants, vitamins, minerals, amino acids, and
                                beneficial fats from flax seed and borage oil. Biome Shake helps balance
                                and purify your microbiome with broccoli, digestive enzymes, and
                                probiotics. Its 20g of clean vegetable protein per serving also keeps you
                                feeling satisfied and serves as a powerful building block to achieving your
                                weight management and body composition goals. This delicious vanilla
                                shake is certified vegan and gluten free</p>
                        </div>
                        <div class='sac--item'>
                            <img src='{{ asset('images/biome-shake.png') }}' alt='Biome Shake'>
                        </div>
                    </div>

                    <div class='sac'>
                        <div class='sac--item'>
                            <img src='{{ asset('images/biome-actives.png') }}' alt='Biome Actives'>
                        </div>
                        <div class='sac--item details'>
                            <header>BIOME ACTIVES</header>
                            <p>Biome Actives combines both prebiotic and probiotics to create a
                                favorable environment for beneficial gut bacteria. Providing 1 billion
                                colony-forming units (CFU) of probiotic Bacillus coagulant per capsule,
                                Biome Actives helps maintain microbiome balance in the digestive system
                                and supports health detoxification.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class='microbiome_section' id='energy_and_fitness'>
            <div class='container'>
                <div class='container--item'>
                    <div class='section_header'>
                        <h3 class='section_title_secondary'>ENERGY, sports fitness & Mental clarity</h3>
                    </div>

                    <div class='sac'>
                        <div class='sac--item'>
                            <img src='{{ asset('images/proargi9+.png') }}' alt='Proargi9+'>
                        </div>
                        <div class='sac--item details'>
                            <header>Proargi-9+</header>
                            <p>ProArgi-9+ is packed with pharmaceutical grade l-arginine, an amino
                                acid that, as recognized my the Nobel Prize in Medicine, the body
                                converts to nitric oxide to help enhance blood circulation to vital organs
                                throughout the cardiovascular system. Formulated in collaboration with
                                leading l-arginine researchers and cardiovascular specialists, ProArgi-9+
                                may help energy levels, stamina, muscle growth, and immune function. It
                                may also help maintain healthy blood pressure and blood sugar levels
                                and reduce adipose tissue body fat. </p>
                        </div>
                    </div>

                    <div class='sac gray'>
                        <div class='sac--item details'>
                            <header>E9</header>
                            <p>e9 offers you a healthy alternative to naturally boost your energy from
                                natural caffeine from guarana, a powerful blend of l-arginine and other
                                amino acids, and B-vitamins. Its unique low-calorie formulation gives you
                                long-lasting energy, increased alertness and cognitive capacity, and
                                increased physical performance, and then lets your energy gradually
                                subside without experiencing that sudden crash. Great tasting Tropical
                                Burst flavor. </p>
                        </div>
                        <div class='sac--item'>
                            <img src='{{ asset('images/e9.png') }}' alt='e9'>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class='microbiome_section' id='healthy_blood_pressure'>
            <div class='container'>
                <div class='container--item'>
                    <div class='section_header'>
                        <h3 class='section_title_secondary'>Healthy Blood pressure, Blood sugar & cholesterol levels</h3>
                    </div>

                    <div class='sac'>
                        <div class='sac--item'>
                            <img src='{{ asset('images/proargi9+.png') }}' alt='Proargi9+'>
                        </div>
                        <div class='sac--item details'>
                            <header>Proargi-9+</header>
                            <p>ProArgi-9+ is packed with pharmaceutical grade l-arginine, an amino
                                acid that, as recognized my the Nobel Prize in Medicine, the body
                                converts to nitric oxide to help enhance blood circulation to vital organs
                                throughout the cardiovascular system. Formulated in collaboration with
                                leading l-arginine researchers and cardiovascular specialists, ProArgi-9+
                                may help energy levels, stamina, muscle growth, and immune function. It
                                may also help maintain healthy blood pressure and blood sugar levels
                                and reduce adipose tissue body fat.</p>
                        </div>
                    </div>

                    <div class='sac gray'>
                        <div class='sac--item details'>
                            <header>Biome balance </header>
                            <p>Biome Balance’s berberine is a nature extract of Indian barberry root that
                                supports gut health and microbiome balance by combatting endotoxins
                                which can interfere with gut performance and glucose metabolism.
                                Berberine also supports healthy insulin response and healthy cholesterol
                                and triglyceride levels. </p>
                        </div>
                        <div class='sac--item'>
                            <img src='{{ asset('images/biome-balance.png') }}' alt='Biome Balance'>
                        </div>
                    </div>

                    <div class='sac'>
                        <div class='sac--item'>
                            <img src='{{ asset('images/metabolic-ldl.png') }}' alt='Metabolic LDL'>
                        </div>
                        <div class='sac--item details'>
                            <header>Metabolic ldl </header>
                            <p>Metabolic LDL combines bergamot orange extract with a proprietary
                                blend of high-ORAC antioxidants that help support healthy total
                                cholesterol and triglyceride levels. It works by blocking an enzyme the
                                liver needs to produce LDL cholesterol. This unique and powerful herbal
                                formula helps modulate cholesterol oxidation and maintain healthy
                                cholesterol levels. </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class='microbiome_section'>
            <div class='container'>
                <div class='container--item'>
                    <div class='section_header'>
                        <h3 class='section_title_secondary'>ELITE health challenge Clinical results: improvements over diet & exercise alone (90 days)</h3>
                    </div>
                </div>
            </div>
        </section>

        <section class='stats_section'>
            <div class='container'>
                <div class='stats_container'>
                    <div class='stat_item'>
                        <div class='circle_container'>
                            <p class='percentage'>56%</p>
                        </div>
                        <p class='description'>
                            More Weight Loss
                        </p>
                    </div>
                    <div class='stat_item'>
                        <div class='circle_container'>
                            <p class='percentage'>65%</p>
                        </div>
                        <p class='description'>
                            More Fat Loss
                        </p>
                    </div>
                    <div class='stat_item'>
                        <div class='circle_container'>
                            <p class='percentage'>125%</p>
                        </div>
                        <p class='description'>
                            Reduction in Systolice Blood Pressure
                        </p>
                    </div>
                    <div class='stat_item'>
                        <div class='circle_container'>
                            <p class='percentage'>62%</p>
                        </div>
                        <p class='description'>
                            Reduction in Diastolic Blood Pressure
                        </p>
                    </div>
                    <div class='stat_item'>
                        <div class='circle_container'>
                            <p class='percentage'>66%</p>
                        </div>
                        <p class='description'>
                            Reduction In Total Cholesterol
                        </p>
                    </div>
                    <div class='stat_item'>
                        <div class='circle_container'>
                            <p class='percentage'>80%</p>
                        </div>
                        <p class='description'>
                            Reduction in LDL 'BAD' Cholesterol
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class='start_now_section'>
            <div class='container'>
                <div class='container--item'>
                    <h3>Achieve Elite Health</h3>
                    <h6>When you sign up you will gain acces to our meal plan fitnes plan, and be sent enough products for this 2 week trial challenge. All of which are 100% money back guarantee.</h6>
                </div>
                <div class='container--item'>
                    <a href='{{ url('elite_challenge/step/1') }}' class='btn-light'>START NOW</a>
                </div>
            </div>
        </section>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

    </script>
@endsection
