<template>
  <app-layout>
    <template #header>
      <h2 class="font-bold text-white leading-tight">
        {{ form.company_name }}
      </h2>
      <jet-danger-button class="ml-2" @click="clickDetection" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
        Delete Account
      </jet-danger-button>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
          <form @submit.prevent="update">
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

    <jet-dialog-modal :show="clickDetectionButton" @close="closeModal">
      <template #title>
        Delete Account
      </template>

      <template #footer>
        <jet-secondary-button @click="closeModal">
          Cancel
        </jet-secondary-button>

        <jet-danger-button class="ml-2" @click="deleteUser" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Delete Account
        </jet-danger-button>
      </template>
    </jet-dialog-modal>
  </app-layout>
</template>
<script>
import AppLayout from '@/Layouts/AppLayout'
import JetInput from '@/Jetstream/Input'
import JetInputError from '@/Jetstream/InputError'
import JetLabel from '@/Jetstream/Label'
import JetButton from '@/Jetstream/Button'
import JetDangerButton from '@/Jetstream/DangerButton'
import JetSecondaryButton from '@/Jetstream/SecondaryButton'
import JetDialogModal from '@/Jetstream/DialogModal'

export default {
  props: ['client', 'errors'],
  components: {
    AppLayout,
    JetInput,
    JetInputError,
    JetLabel,
    JetButton,
    JetDangerButton,
    JetSecondaryButton,
    JetDialogModal
  },
  data() {
    return {
      form: this.$inertia.form({
        description: this.client.description,
        company_name: this.client.company_name,
        legal_status: this.client.legal_status,
        capital: this.client.capital,
        siret: this.client.siret,
        code_naf: this.client.code_naf,
        country: this.client.country,
        address: this.client.address,
        zip_code: this.client.zip_code,
        city: this.client.city,
        projects: this.client.projects
      }),
      clickDetectionButton: false
    }
  },
  methods: {
    update() {
      this.form.put(this.route('client.update', [this.client.id]), this.form);
    },
    clickDetection() {
      this.clickDetectionButton = true;
    },
    deleteUser() {
      this.form.delete(this.route('client.delete', [this.client.id]), {
        preserveScroll: true,
        onSuccess: () => this.closeModal(),
        onError: () => 'erreur',
        onFinish: () => this.form.reset(),
      })
    },
    closeModal() {
      this.clickDetectionButton = false;
      this.form.reset();
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
