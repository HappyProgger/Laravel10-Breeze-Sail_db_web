<script>
// const submit = () => {
//     div.post(route('category.store'));
// };
export default {
    name: "Client_create",
    props: {
        errors: {
            errors: Object
        }
    },
    data() {
        return {
            validation_errors: "",

            client_form: {
                _token: this.$inertia.page.props.csrf_token,
                full_name: '',
                gender: '',
                phone: '',
                address: '',
            },
            current_client_id: '',
            client_car_form: {
                _token: this.$inertia.page.props.csrf_token,
                brand: '',
                model: '',
                body_color: '',
                license_plate: '',
                is_parked: '',
                client_id: '',
            },
            client_cars: [],
            ifs: {

                is_add_car: true,
                is_add_car_form: true,
                is_can_create_client: true

            }
        }
    },

    methods: {
        post_data_create_user() {
            axios.post(
                'http://localhost/clients/',
                this.client_form
            ).then(res => {
                console.log(res.data.id_client[0].id);
                this.client_car_form.client_id = res.data.id_client[0].id;
                this.current_client_id = res.data.id_client[0].id;
                this.validation_errors = ""
            }, error => {
                this.validation_errors = error.response.data.errors;
                console.log(error)
            })
        },
        post_data_create_users_car() {
            axios.post(
                'http://localhost/clients/store_client_cars/',
                this.client_car_form
            ).then(res => {
                console.log(res.data);
                this.validation_errors = ""
                this.client_cars.push(this.client_car_form)
                this.client_car_form =
                    {
                        _token: this.$inertia.page.props.csrf_token,
                        brand: '',
                        model: '',
                        body_color: '',
                        license_plate: '',
                        is_parked: '',
                        client_id: this.client_car_form.client_id,
                    }
            }, error => {
                this.validation_errors = error.response.data.errors;
                console.log(error)
            })

        },

    is_add_car_form_on() {
        if (this.ifs.is_add_car_form == true) {
            this.ifs.is_add_car_form = false
        } else {
            this.ifs.is_add_car_form = true
        }
        this.client_car_form = {}
    },
    return_to_clients_page(relative_page_url) {
        window.location = window.location.origin + relative_page_url
        }
    },


    // add_car_in_arr_clients_cars() {
    //     this.client_cars.push(this.client_car_form)
    //     // this.client_car_form = {}
    //     this.ifs.is_add_car_form = false
    //
    // },
    // not_filled_object(object) {
    //     object.forEach(el => console.log(el))
    // }

    watch: {
        client_form: {
            handler(newValue, oldValue) {
                let is = true
                Object.values(this.client_form).forEach(el => {
                    if (el === "") {
                        is = false
                    }
                })
                this.ifs.is_add_car = is
            },
            deep: true
        },
        current_client_id() {
            this.client_car_form.client_id = this.current_client_id
        }
    }

}
</script>

<template>
    <div class="m-10">
        <h1 class="text-3xl ml-10 ">Client</h1>
        <div class="p-8">
            <div class="mb-6">
                <!--                <input type="hidden" name="_token" v-model="this.csrf_token"/>-->

                <label
                    for="full_name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Full name</label
                >
                <input
                    :class="{'disabled' : errors.full_name}"
                    type="text"
                    name="full_name"
                    v-model="client_form.full_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder=""

                />
                <div v-if="validation_errors?.full_name"
                     v-for="error in validation_errors?.full_name "
                     class="text-red-600 text-sm">{{ error }}
                </div>
            </div>
            <div class="mb-6">
                <label
                    for="gender"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Gender</label>
                <input
                    type="text"
                    name="gender"
                    v-model="client_form.gender"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                     focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                      dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                      dark:focus:border-blue-500"

                />
                <div v-if="validation_errors?.gender"
                     v-for="error in validation_errors?.gender "
                     class="text-red-600 text-sm">{{ error }}
                </div>
            </div>
            <div class="mb-6">
                <label
                    for="phone"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Phone</label>
                <input
                    type="text"
                    name="phone"
                    v-model="client_form.phone"
                    class="bg-gray-50 border border-gray-300
                     text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block
                     w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                     dark:focus:ring-blue-500 dark:focus:border-blue-500"

                />
                <div v-if="validation_errors?.phone"
                     v-for="error in validation_errors?.phone"
                     class="text-red-600 text-sm">{{ error }}
                </div>

            </div>
            <div class="mb-6">
                <label
                    for="address"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Addres</label>
                <input
                    type="text"
                    name="address"
                    v-model="client_form.address"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"

                />
                <div v-if="validation_errors?.address"
                     v-for="error in validation_errors?.address"
                     class="text-red-600 text-sm">{{ error }}
                </div>
            </div>


            <button v-if="!this.current_client_id"
                    type="button"
                    @click="post_data_create_user()"

                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
                Create client
            </button>

        </div>

        <h1 class="text-3xl ml-10 mb-10  ">Cars</h1>


        <div
            v-for="car in client_cars" :key="car.license_plate"

            class="cars ml-10 mb-5 ">
            <h1 class="text-xl mb-2">Car with license plate "{{ car.license_plate }}"</h1>
            <div class="car">
                <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Brand: {{ car.brand }} </label
                >
                <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Model: {{ car.model }}</label
                >
                <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"

                >Body color: {{ car.body_color }}</label>


                <label

                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >License plate: {{ car.license_plate }}</label
                >
                <label

                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Parked: {{ car.is_parked }}</label
                >
            </div>
        </div>


        <div v-if="current_client_id" class="p-8">
            <!--            <input type="hidden" name="_token" v-model="this.csrf_token"/>-->

            <div class="mb-6">
                <label
                    for="brand"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Brand</label
                >
                <input
                    type="text"
                    name="brand"
                    v-model="client_car_form.brand"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder=""

                />
                <div
                    v-if="validation_errors?.brand"
                    v-for="error in this.validation_errors?.brand"
                    class="text-red-600 text-sm">{{ error }}
                </div>
            </div>
            <div class="mb-6">
                <label
                    for="model"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Car model</label>
                <input
                    type="text"
                    name="model"
                    v-model="client_car_form.model"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"

                />
                <div
                    v-if="validation_errors?.model"
                    v-for="error in validation_errors?.model"
                    class="text-red-600 text-sm">{{ error }}
                </div>
            </div>
            <div class="mb-6">
                <label
                    for="body_color"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Car body_color</label>
                <input
                    name="body_color"
                    type="text"
                    v-model="client_car_form.body_color"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"

                />
                <div v-if="validation_errors?.body_color"
                     v-for="error in validation_errors?.body_color"
                     class="text-red-600 text-sm">{{
                        error
                    }}
                </div>
            </div>
            <div class="mb-6">
                <label
                    for="license_plate"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >License plate</label>
                <input
                    name="license_plate"
                    type="text"
                    v-model="client_car_form.license_plate"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                     focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                      dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"

                />
                <div v-if="validation_errors?.license_plate"
                     v-for="error in validation_errors?.license_plate"
                     class="text-red-600 text-sm">
                    {{ error }}
                </div>
            </div>
            <div class="mb-6">
                <label
                    for="is_parked"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Choose a state of machine</label>

                <select

                    v-model="client_car_form.is_parked"
                    id="is_parked"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                     dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    <option value=true>Parked</option>
                    <option value=false>Not parked</option>

                </select>


                <div v-if="validation_errors?.is_parked"
                     v-for="error in validation_errors?.is_parked"
                     class="text-red-600 text-sm">{{
                        error
                    }}
                </div>
            </div>


            <button
                :class="{ 'disabled' : this.current_client_id,  }"
                @click="post_data_create_users_car()"
                type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
                Add car to client
            </button>

        </div>
        <button
            v-if="client_cars.length>0"
            :class="{ 'disabled' : this.current_client_id,  }"
            @click="this.return_to_clients_page('/clients')"
            type="button"
            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
        >
            Return back to clients list
        </button>
    </div>


</template>

<style scoped>

</style>
