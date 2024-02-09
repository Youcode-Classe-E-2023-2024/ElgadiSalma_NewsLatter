@if(auth()->check() && auth()->user()->role === 0)
@extends('layout')

@section('content')

<h1 class="text-4xl text-purple-500 pt-20 text-center font-bold">Statistiques</h1>
<div id="statistique">
    <!-- graphe -->
        <div class="pt-20 flex justify-center">
        <div class=" gap-10 flex flex-wrap w-full justify-center">
        <div class="w-1/2 py-6 px-6 1/3 rounded-xl border border-gray-800 bg-white">
            <h5 class="text-xl text-gray-700">Abonnement</h5>
            <canvas id="subscriberChart" class="w-full" height="150"></canvas>
        </div>

    <!-- end graphe -->

        <div class=" w-1/2 py-6 px-6 rounded-xl flex flex-col gap-5 bg-gray-100 text-center border border-gray-800 bg-white">
            <div>
                <h5 class="text-xl text-black font-bold"><ins>Nombre d'abonnés :</ins></h5>
                <h1 class="text-2xl text-gray-600">{{ $totalSubscribers }} abonnés</h1>
            </div>

            </div>
        </div>
        </div>

    <!-- Ajoutdu bouton d'exportation PDF -->
    <div class="flex justify-center pt-10 mt-6">
        <button class="bg-purple-300 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" onclick="pdf()">Exporter en PDF</button>
    </div>
</div>

<script>

        console.log("salma");
           
        const dates = @json($subscriberStatistics->pluck('date'));
        const counts = @json($subscriberStatistics->pluck('subscriber_count'));

        const ctx = document.getElementById('subscriberChart').getContext('2d');
        const subscriberChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Nombre d\'abonnements ajoutés',
                    data: counts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Nombre d\'abonnements'
                        }
                    }
                }
            }
        });

        function pdf()
        {
            const element = document.getElementById('statistique');
            html2pdf(element);
        }
          
</script>

@endsection
@endif
