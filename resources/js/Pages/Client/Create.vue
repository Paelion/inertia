<template>
  <app-layout>
    <template #header>
      <h2 class="font-bold text-white leading-tight">
        Créer un client
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
          <form @submit.prevent="save">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-4">
                <jet-label for="description" value="Description"/>
                <jet-input id="description" type="desciption" class="mt-1 block w-full" v-model="form.description"
                           ref="description" autocomplete="description"/>
                <jet-input-error :message="form.errors.description" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="company_name" value="Raison Social"/>
                <jet-input id="company_name" type="company_name" class="mt-1 block w-full" v-model="form.company_name"
                           ref="company_name" autocomplete="company_name"/>
                <jet-input-error :message="form.errors.company_name" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="legal_status" value="Statut Juridique"/>
                <jet-input id="legal_status" type="legal_status" class="mt-1 block w-full" v-model="form.legal_status"
                           ref="legal_status" autocomplete="legal_status"/>
                <jet-input-error :message="form.errors.legal_status" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="capital" value="Capital"/>
                <jet-input id="capital" type="legal_status" class="mt-1 block w-full" v-model="form.capital"
                           ref="capital" autocomplete="capital"/>
                <jet-input-error :message="form.errors.capital" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="siret" value="Siret"/>
                <jet-input id="siret" type="siret" class="mt-1 block w-full" v-model="form.siret"
                           ref="siret" autocomplete="siret"/>
                <jet-input-error :message="form.errors.siret" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="code_naf" value="Code NAF (APE)"/>
                <jet-input id="code_naf" type="code_naf" class="mt-1 block w-full" v-model="form.code_naf"
                           ref="code_naf" autocomplete="code_naf"/>
                <jet-input-error :message="form.errors.code_naf" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="country" value="Pays"/>
                <jet-input id="country" type="country" class="mt-1 block w-full" v-model="form.country"
                           ref="country" autocomplete="country"/>
                <jet-input-error :message="form.errors.country" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="address" value="Adresse"/>
                <textarea class="mt-1 block w-full" name="address" cols="10" rows="10"
                          v-model="form.address"></textarea>
                <jet-input-error :message="form.errors.address" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="zip_code" value="Code Postal"/>
                <jet-input id="zip_code" type="zip_code" class="mt-1 block w-full" v-model="form.zip_code"
                           ref="zip_code" autocomplete="zip_code"/>
                <jet-input-error :message="form.errors.zip_code" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="city" value="Ville"/>
                <jet-input id="city" type="city" class="mt-1 block w-full" v-model="form.city"
                           ref="city" autocomplete="city"/>
                <jet-input-error :message="form.errors.city" class="mt-2"/>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <jet-label for="projects" value="Projets"/>
                <jet-input id="projects" type="projects" class="mt-1 block w-full" v-model="form.projects"
                           ref="projects" autocomplete="projects"/>
                <jet-input-error :message="form.errors.projects" class="mt-2"/>
              </div>
            </div>

            <jet-button :class="{ 'opacity-25': form.processing }" class="mt-5" :disabled="form.processing">
              Sauvegarder
            </jet-button>
          </form>
          <jet-button @click="cancel" class="mt-5">
            Annuler
          </jet-button>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetInput from '@/Jetstream/Input'
import JetInputError from '@/Jetstream/InputError'
import JetLabel from '@/Jetstream/Label'
import JetButton from '@/Jetstream/Button'

export default {
  props: ['errors'],
  components: {
    AppLayout,
    JetInput,
    JetInputError,
    JetLabel,
    JetButton
  },
  data() {
    return {
      form: this.$inertia.form({
        description: '',
        company_name: '',
        legal_status: '',
        capital: '',
        siret: '',
        code_naf: '',
        country: '',
        address: '',
        zip_code: '',
        city: '',
        projects: ''
      })
    }
  },
  methods: {
    save() {
      this.form.post(this.route('client.store'), this.form);
    },
    cancel(){
      this.$inertia.visit(this.route('client.index'));
    }
  }
}
</script>

<style>
h2 {
  font-size: 35px;
}
</style>

