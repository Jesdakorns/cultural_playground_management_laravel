<template>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body remake">
                    <img
                        src="assets/images/dashboard/circle.svg"
                        class="card-img-absolute"
                        alt="circle-image"
                    />
                    <h4 class="font-weight-normal mb-3">
                        จำนวนข้อมูล
                        <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{ data.item_count }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body remake">
                    <img
                        src="assets/images/dashboard/circle.svg"
                        class="card-img-absolute"
                        alt="circle-image"
                    />
                    <h4 class="font-weight-normal mb-3">Matching Game</h4>
                    <h2 class="mb-5" id="matching_count">    {{ data.games_count.matching_count }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body remake">
                    <img
                        src="assets/images/dashboard/circle.svg"
                        class="card-img-absolute"
                        alt="circle-image"
                    />
                    <h4 class="font-weight-normal mb-3">Puzzle Game</h4>
                    <h2 class="mb-5">{{ data.puzzle_count }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-warning card-img-holder text-white">
                <div class="card-body remake">
                    <img
                        src="assets/images/dashboard/circle.svg"
                        class="card-img-absolute"
                        alt="circle-image"
                    />
                    <h4 class="font-weight-normal mb-3">Quiz Game</h4>
                    <h2 class="mb-5" id="quiz_count">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-primary card-img-holder text-white">
                <div class="card-body remake">
                    <img
                        src="assets/images/dashboard/circle.svg"
                        class="card-img-absolute"
                        alt="circle-image"
                    />
                    <h4 class="font-weight-normal mb-3">Mole Game</h4>
                    <h2 class="mb-5" id="mole_count">0</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-dark card-img-holder text-white">
                <div class="card-body remake">
                    <img
                        src="assets/images/dashboard/circle.svg"
                        class="card-img-absolute"
                        alt="circle-image"
                    />
                    <h4 class="font-weight-normal mb-3">Cosmos Game</h4>
                    <h2 class="mb-5" id="cosmos_count">0</h2>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    mounted() {
        axios.get("data_home").then(response => (this.data = response.data));
    },
    data() {
        return {
            data: {
                item_count: 0,
                games_count: {
                    matching_count: 0,
                    puzzle_count: 0,
                    quiz_count: 0,
                    mole_count: 0,
                    cosmos_count: 0
                }
            }
        };
    }
};
</script>
