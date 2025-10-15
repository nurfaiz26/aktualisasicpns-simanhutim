<x-layout>
    <div class="w-full flex flex-col items-center space-y-10 px-10 lg:px-40">
        <section class="mt-10 w-full flex flex-col items-center">
            <div class="aspect-[4/3] w-full max-w-xl h-auto bg-gray-500"></div>
        </section>

        <section class="mt-10 w-full max-w-4xl flex flex-col items-center">
            <div class="w-full flex items-end justify-between">
                <div class="flex flex-col">
                    <h1 class="text-2xl font-extrabold text-main">Judul Berita</h1>
                    <div class="flex text-main gap-1">
                        <p>Klasifikasi: </p> 
                        <p>Umrah</p>
                        <p> | </p>
                        <p>PPIU</p>
                    </div>
                </div>

                <p class="text-main">{{ Carbon\Carbon::now()->format('d/m/Y') }}</p>
            </div>

            <div class="mt-10 text-main text-justify">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore quos tempora nam animi mollitia
                    exercitationem quisquam sint minus recusandae provident a nulla ipsa iure culpa voluptatum corporis,
                    qui laudantium. Libero quo cumque fugit vero delectus architecto quia, illum debitis doloribus
                    voluptate consequatur distinctio, expedita assumenda unde nisi asperiores neque, aspernatur
                    repellendus facilis! Delectus laboriosam earum atque modi dolorem at aliquid omnis voluptas impedit
                    nam, eos mollitia a et nemo non dolore, neque possimus ad laborum vitae harum perspiciatis
                    doloremque. Voluptatum beatae nobis, rem unde esse tempora possimus accusamus reprehenderit. Ullam
                    obcaecati facere sed molestias harum eum sunt velit incidunt nemo.</p>
            </div>
        </section>
    </div>
</x-layout>
