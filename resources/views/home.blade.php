@extends('app')
@section('title')
    {{' | Home'}}
@endsection
@section('content')
    <main id="home" class="base">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>Welcome to the First Edition of <strong>Star Wars VideOlympicGames</strong>. This event is about playing a series of challenges and recording your performance, that will be compared to other players until we find a global champion! </p>
                    <p>Every game event will have specific details on how it will be played. Once ALL players have participated, a Score will be assigned depending on the relative performance they had.</p>
                    <ul class="padFixL">
                        <li>First place: <strong>1000 points</strong></li>
                        <li>Second place: <strong>700 points</strong></li>
                        <li>Third place: <strong>500 points</strong></li>
                        <li>Fourth place: <strong>400 points</strong></li>
                        <li>Fifth place: <strong>300 points</strong></li>
                        <li>Sixth place: <strong>250 points</strong></li>
                        <li>Seventh place: <strong>200 points</strong></li>
                        <li>Eight place: <strong>150 points</strong></li>
                        <li>Ninth place: <strong>100 points</strong></li>
                        <li>Tenth place and beyond: <strong>50 points</strong></li>
                    </ul>


                    <hr>
                    <p>The events will be played on <strong>Star Wars: Squadrons</strong> and <strong>X-Wing vs TIE Fighter</strong></p>
                    <p>If a player is able and willing to play in both games, you may fly in the event as a solo pilot. If you only play one of the games, you may team up with another player that only plays the other game and participate as a duo element.</p>

                    <hr>
                    <h2>General Rules</h2>
                    <ul class="bulleted">
                        <li>For every event you have <strong>two</strong> chances, aka, <strong>two</strong> trials.</li>
                        <li>Only the best of those two trials will count towards the final score.</li>
                        <li>Once everyone has played, or the deadline has been reached, all players' trials will be sorted and points will be awarded according to the list above.</li>
                        <li>For <span class="orange"> Squadrons</span> you will play at the highest difficulty: <span class="yellow"> <strong> Practice on Ace</strong>, <strong>Fleet Battles on Normal</strong> with no modifiers.</span></li>
                        <li>For <span class="cyan"> XvT</span> you will play with <span class="yellow"><strong>Hard difficulty</strong>, <strong>Randomize OFF</strong>, <strong>Default Mission Time</strong>, and <strong>Craft Collision ON</strong>.</span></li>
                        <li>All trials must be spectated somehow by at least one other player. For timed events, a recording/VOD is required.</li>
                    </ul>
                    <hr>
                    <h2>Standings</h2>
                    @if(count($standings))
                    <ul id="standings-table" class="color-coded mtop90">
                        @foreach($standings as $atleta)
                            <li class="{{ $atleta->color }}">
                                <img src="/images/athletes/{{ $atleta->imagen ?? "default.png"}}" alt="{{ $atleta->nombre }}">
                                <p class="atleta">{{ $atleta->nombre }}
                                    <span>{{ $atleta->integrantes }}</span>
                                    <img src="/images/{{ $atleta->integrantes == "" ? 'solo.jpg' : 'duo.jpg'}}" alt="{{ $atleta->integrantes == "" ? 'Solo Athlete' : 'Duo Team'}}" title="{{ $atleta->integrantes == "" ? "Solo Athlete" : "Duo Team"}}"></p>

                                <p class="evento-score"><strong>{{ $atleta->score ?? '0' }}</strong> <span>PTS</span></p>
                            </li>
                        @endforeach
                    </ul>
                    @else
                        <p>No athletes registered yet.</p>
                    @endif

                    <hr>


                </div>
            </div>
        </div>
    </main>
@endsection
