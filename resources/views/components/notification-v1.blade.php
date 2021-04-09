<div x-data="noticesHandler()" @notification.window="add($event.detail)">
    <template x-for="notice of notices" :key="notice.id">
        <div aria-live="assertive" class="fixed inset-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end"
            x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="ttranslate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="remove(notice.id)">
            <div class="max-w-sm w-full shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden" :class="getColor(notice)">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0" x-html="getIcon(notice)"></div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm font-medium text-gray-900" x-text="notice.title"></p>
                            <p class="mt-1 text-sm text-gray-500" x-text="notice.message"></p>
                        </div>
                        <div class="ml-4 flex-shrink-0 flex">
                            <button class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" 
                            @click="remove(notice.id)">
                                <span class="sr-only">Close</span>
                                <!-- Heroicon name: solid/x -->
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
    <script>
        function noticesHandler() {
            return {
                notices: [],

                add(notice) {
                    notice.id = Date.now()
                    this.notices.push(notice)
                    this.fire(notice.id)
                },

                fire(id) {
                    const timeShown = 2000 * this.notices.length
                    setTimeout(() => {
                        this.remove(id)
                    }, timeShown)
                },

                remove(id) {
                    const notice = this.notices.find(notice => notice.id == id)
                    const index = this.notices.indexOf(notice)
                    this.notices.splice(index, 1)
                },

                getIcon(notice){
                    if ( notice.type == 'success')
                        return "<svg class='h-6 w-6 text-green-400' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>" ;
                    else if ( notice.type == 'info')
                        return "<svg class='h-6 w-6 text-blue-400' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>"
                    else if ( notice.type == 'warning')
                        return "<svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6  text-yellow-400' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z' /></svg>"
                    else if ( notice.type == 'danger')
                        return "<svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'> <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z' /> </svg>"
                },

                getColor(notice){
                    if ( notice.type == 'success' ){
                        return 'blue';
                    }else if ( notice.type == 'warning' ){
                        return 'yellow';
                    }else if ( notice.type == 'danger' ){
                        return 'red';
                    }
                }
            };
        }
    </script>
</div>
  