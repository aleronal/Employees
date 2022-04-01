<template>
  <div>
     <div class="flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Countries</h1>
    </div>

    <div class="row">
        <div class="card mx-auto">
            <div class="card-header">
                Create Employees
                <router-link class="float-right btn btn-primary" :to="{name:'EmployeesIndex'}">Back</router-link>
            </div>
            <div class="card-body">
                <form>

                    <div class="row mb-3">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end"> First Name</label>
                        <div class="col-md-6">
                            <input id="first_name" type="text" class="form-control" name="first_name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end"> Last Name</label>
                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control" name="last_name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="middle_name" class="col-md-4 col-form-label text-md-end"> Middle Name</label>
                        <div class="col-md-6">
                            <input id="middle_name" type="text" class="form-control" name="middle_name" required>
                        </div>
                    </div>
                     <div class="row mb-3">
                        <label for="birth_date" class="col-md-4 col-form-label text-md-end">Birth Date</label>
                            <div class="col-md-6">
                                 <input id="birth_date" type="date" class="form-control" name="birth_date" required>
                            
                            </div>
                   
                    </div>
                     <div class="row mb-3">
                        <label for="date_hired" class="col-md-4 col-form-label text-md-end">Date Hired</label>
                            <div class="col-md-6">
                                  <datepicker input-class="form-control" name="" ></datepicker>
                            </div>
                   
                    </div>
                    
                  


                    <div class="row mb-3">
                        <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>
                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="country" class="col-md-4 col-form-label text-md-end">Country</label>

                        <div class="col-md-6">
                            <select name="country" class="form-control" aria-label="Default select example">
                                <option selected disabled> Select Country </option>  
                        
                                    <option :value="country.id" v-for="country in countries" :key="country.id">{{country.name}}</option>  
                                  
                              </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="state" class="col-md-4 col-form-label text-md-end">State</label>

                        <div class="col-md-6">
                            <select name="state" class="form-control" aria-label="Default select example">
                                <option selected disabled> Select State </option>  
                              </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="department" class="col-md-4 col-form-label text-md-end">Department</label>

                        <div class="col-md-6">
                            <select name="department" class="form-control" aria-label="Default select example">
                                <option selected disabled> Select State </option>  
                              </select>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="city" class="col-md-4 col-form-label text-md-end">City</label>

                        <div class="col-md-6">
                            <select name="city" class="form-control" aria-label="Default select example">
                                <option selected disabled> Select State </option>  
                              </select>
                        </div>
                    </div>
                     <div class="row mb-3">
                        <label for="zip_code" class="col-md-4 col-form-label text-md-end">Zip Code</label>
                        <div class="col-md-6">
                            <input id="zip_code" type="text" class="form-control" name="zip_code" required>
                        </div>
                    </div>

                    

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Store Employee
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
export default {
    components:{
        Datepicker
    },
    data(){
        return {
            countries: [],
            states: [],
            departments: [],
            cities: []
        }

    },

    created() {
        this.getCountries();
    },

    methods: {
        getCountries(){
            axios.get('/api/employees/countries')
            .then(res => {
                this.countries = res.data;
            })
            .catch(err => {
                console.log(err);
            })

        }
    },

    

    

}
</script>

<style scoped>

    .card{
        width: 600px;
    }

</style>