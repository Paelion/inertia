<template>
  <app-layout>
    <template #header>
      <h2 class="font-bold text-white leading-tight">
        {{ form.title }}
      </h2>
      <jet-danger-button class="ml-2 button-delete" @click="clickDetection" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
        Delete Account
      </jet-danger-button>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
          <form @submit.prevent="update">
            <div class="grid grid-cols-2 gap-6">
              <div class="text-block col-span-6 sm:col-span-4">
                <div class="font-bold text-xl text-black">Résponsable projet</div>
                <span class="text-gray-600">Ces informations serviront à savoir qui dirige le projet du côté du client</span>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="client" value="Client"/>
                <jet-input id="client" type="client" class="mt-1 block w-50" v-model="form.client"
                           ref="client" autocomplete="client"/>
                <jet-input-error :message="form.errors.client" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="lastname" value="Nom"/>
                <jet-input id="lastname" type="lastname" class="mt-1 block w-50" v-model="form.lastname"
                           ref="lastname" autocomplete="lastname"/>
                <jet-input-error :message="form.errors.lastname" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="firstname" value="Prénom"/>
                <jet-input id="firstname" type="firstname" class="mt-1 block w-50" v-model="form.firstname"
                           ref="firstname" autocomplete="firstname"/>
                <jet-input-error :message="form.errors.firstname" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="phone" value="Téléphone"/>
                <jet-input id="phone" type="phone" class="mt-1 block w-50" v-model="form.phone"
                           ref="phone" autocomplete="phone"/>
                <jet-input-error :message="form.errors.phone" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="email" value="Email"/>
                <jet-input id="email" type="email" class="mt-1 block w-50" v-model="form.email"
                           ref="email" autocomplete="email"/>
                <jet-input-error :message="form.errors.email" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="title" value="Titre"/>
                <jet-input id="title" type="title" class="mt-1 block w-50" v-model="form.title"
                           ref="title" autocomplete="title"/>
                <jet-input-error :message="form.errors.title" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="description" value="Description"/>
                <textarea class="mt-1 block w-50" name="description" cols="10" rows="10"
                          v-model="form.description"></textarea>
                <jet-input-error :message="form.errors.description" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="start_date" value="Début du projet"/>
                <jet-input id="start_date" type="start_date" class="mt-1 block w-50" v-model="form.start_date"
                           ref="start_date" autocomplete="start_date"/>
                <jet-input-error :message="form.errors.start_date" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="end_date" value="Fin estimée du projet"/>
                <jet-input id="end_date" type="end_date" class="mt-1 block w-50" v-model="form.end_date"
                           ref="end_date" autocomplete="end_date"/>
                <jet-input-error :message="form.errors.end_date" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="zip_code" value="Code Postal"/>
                <jet-input id="zip_code" type="zip_code" class="mt-1 block w-50" v-model="form.zip_code"
                           ref="zip_code" autocomplete="zip_code"/>
                <jet-input-error :message="form.errors.zip_code" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="status" value="Statut du projet"/>
                <jet-input id="status" type="city" class="mt-1 block w-50" v-model="form.status"
                           ref="status" autocomplete="status"/>
                <jet-input-error :message="form.errors.status" class="mt-2"/>
              </div>

              <div class="form-flex col-span-6 sm:col-span-4">
                <jet-label for="paied_days" value="Nombre de jours vendus"/>
                <jet-input id="paied_days" type="paied_days" class="mt-1 block w-50" v-model="form.paied_days"
                           ref="paied_days" autocomplete="paied_days"/>
                <jet-input-error :message="form.errors.paied_days" class="mt-2"/>
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
  props: ['project', 'errors'],
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
        client: this.project.client,
        lastname: this.project.lastname,
        firstname: this.project.firstname,
        phone: this.project.phone,
        email: this.project.email,
        title: this.project.title,
        description: this.project.description,
        start_date: this.project.start_date,
        end_date: this.project.end_date,
        status: this.project.status,
        paied_days: this.project.paied_days
      }),
      clickDetectionButton: false
    }
  },
  methods: {
    update() {
      this.form.put(this.route('project.update', [this.project.id]), this.form);
    },
    clickDetection() {
      this.clickDetectionButton = true;
    },
    deleteUser() {
      this.form.delete(this.route('project.delete', [this.project.id]), {
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
      this.$inertia.visit(this.route('project.index'));
    }
  }
}
</script>

<style>
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
</style>
