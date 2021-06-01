<template>
  <app-layout>
    <template #header>
      <h2 class="font-bold text-white leading-tight">
        {{ form.company_name }}
      </h2>
      <jet-danger-button class="ml-2 button-delete" @click="clickDetection" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
       Supprimer
      </jet-danger-button>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 relative-form">
          <form @submit.prevent="update">
            <div class="grid grid-cols-2 gap-6">
              <div class="text-block col-span-6 sm:col-span-4">
                <div class="font-bold text-xl text-black">Information société</div>
                <span class="text-gray-600">Informations légales de l'entreprise</span>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="description" value="Description"/>
                <jet-input id="description" type="desciption" class="mt-1 block w-50" v-model="form.description"
                           ref="description" autocomplete="description"/>
                <jet-input-error :message="form.errors.description" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="company_name" value="Raison Social"/>
                <jet-input id="company_name" type="company_name" class="mt-1 block w-50" v-model="form.company_name"
                           ref="company_name" autocomplete="company_name"/>
                <jet-input-error :message="form.errors.company_name" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="legal_status" value="Statut Juridique"/>
                <jet-input id="legal_status" type="legal_status" class="mt-1 block w-50" v-model="form.legal_status"
                           ref="legal_status" autocomplete="legal_status"/>
                <jet-input-error :message="form.errors.legal_status" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="capital" value="Capital"/>
                <jet-input id="capital" type="legal_status" class="mt-1 block w-50" v-model="form.capital"
                           ref="capital" autocomplete="capital"/>
                <jet-input-error :message="form.errors.capital" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="siret" value="Siret"/>
                <jet-input id="siret" type="siret" class="mt-1 block w-50" v-model="form.siret"
                           ref="siret" autocomplete="siret"/>
                <jet-input-error :message="form.errors.siret" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="code_naf" value="Code NAF (APE)"/>
                <jet-input id="code_naf" type="code_naf" class="mt-1 block w-50" v-model="form.code_naf"
                           ref="code_naf" autocomplete="code_naf"/>
                <jet-input-error :message="form.errors.code_naf" class="mt-2"/>
              </div>

              <div class="form-separator text-block col-span-6 sm:col-span-4">
                <div class="font-bold text-xl text-black">Adresse</div>
                <span class="text-gray-600">Localisation du siège social.</span>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="country" value="Pays"/>
                <jet-input id="country" type="country" class="mt-1 block w-50" v-model="form.country"
                           ref="country" autocomplete="country"/>
                <jet-input-error :message="form.errors.country" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4 pt-5">
                <jet-label for="address" value="Adresse"/>
                <textarea class="border-gray-200 rounded-md shadow mt-1 block w-50" name="address" cols="10" rows="10"
                          v-model="form.address"></textarea>
                <jet-input-error :message="form.errors.address" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="zip_code" value="Code Postal"/>
                <jet-input id="zip_code" type="zip_code" class="mt-1 block w-50" v-model="form.zip_code"
                           ref="zip_code" autocomplete="zip_code"/>
                <jet-input-error :message="form.errors.zip_code" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="city" value="Ville"/>
                <jet-input id="city" type="city" class="mt-1 block w-50" v-model="form.city"
                           ref="city" autocomplete="city"/>
                <jet-input-error :message="form.errors.city" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="projects" value="Projets"/>
                <jet-input id="projects" type="projects" class="mt-1 block w-50" v-model="form.projects"
                           ref="projects" autocomplete="projects"/>
                <jet-input-error :message="form.errors.projects" class="mt-2"/>
              </div>
            </div>

            <jet-button :class="{ 'opacity-25': form.processing }" class="btn-save mt-5" :disabled="form.processing">
              Sauvegarder
            </jet-button>
          </form>
          <jet-button @click="cancel" class="btn-cancel mt-5">
            Annuler
          </jet-button>
        </div>
      </div>
    </div>

    <jet-dialog-modal :show="clickDetectionButton" @close="closeModal">
      <template #title>
        <div class="modal-title font-bold">
          <div class="modal-warning">
            <img src="https://www.pauline-aelion.fr/img_other/warning.png" alt="warning">
          </div>
          Supprimer le client "{{ client.company_name }}"
        </div>

      </template>

      <template #content>
        <div class="modal-content text-gray-600">
          Etes-vous réellement sûr de vouloir supprimer ce client ?<br>
          Cette action est irréversible
        </div>
      </template>

      <template #footer>
        <jet-secondary-button @click="closeModal">
          Annuler
        </jet-secondary-button>

        <jet-danger-button class="ml-2" @click="deleteUser" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Supprimer
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
.relative-form {
  position: relative;
  padding: 20px 40px;
}

.relative-form form {
  padding-bottom: 80px;
}

h2 {
  font-size: 35px;
}

.text-block {
  padding-left: 20px;
}

.text-block div {
  padding-bottom: 10px;
}

.form-flex {
  display: flex;
}

.form-separator {
  border-top: 1px solid #e6e7eb;
  padding-top: 20px;
}

.form-flex label{
  width: 200px;
}

.w-50 {
  width: 50%;
}

.button-delete {
  position: absolute;
  right: 50px;
  top: 70px;
}

.btn-save {
  position: absolute;
  right: 40px;
  bottom: 0;
  margin-bottom: 20px;
  background-color: #6467f1;
}

.btn-cancel {
  position: absolute;
  right: 200px;
  bottom: 0;
  margin-bottom: 20px;
  background-color: white;
  border: 1px solid #e6e7eb;
  color: black;
}

.modal-title {
  display: flex;
  align-items: center;
}

.modal-content {
  padding-left: 60px;
}

.modal-warning {
  width: 40px;
  height: 40px;
  margin-right: 20px;
  background-color: #f0d6d6;
  border-radius: 30px;
}

.modal-warning img {
  height: 28px;
  margin-left: 8px;
  padding-top: 5px;
}
</style>
