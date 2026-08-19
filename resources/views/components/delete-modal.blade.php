<div
    id="deleteModal"
    onclick="if(event.target===this)closeDeleteModal()"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">

        {{-- Header --}}
        <div class="bg-red-600 text-white p-6 text-center">

            <h2 class="text-2xl font-bold">
                Konfirmasi Hapus
            </h2>

        </div>

        {{-- Body --}}
        <div class="p-6 text-center">

            <p class="text-gray-600">
                Apakah Anda yakin ingin menghapus data berikut?
            </p>

            <div
                id="deleteName"
                class="mt-5 bg-gray-100 rounded-xl p-4 font-semibold text-gray-800">

            </div>

            <p class="text-sm text-red-500 mt-5">
                Data yang telah dihapus tidak dapat dikembalikan.
            </p>

        </div>

        {{-- Footer --}}
        <form
            id="deleteForm"
            method="POST"
            class="flex justify-end gap-3 p-6 border-t">

            @csrf
            @method('DELETE')

            <button
                type="button"
                onclick="closeDeleteModal()"
                class="px-5 py-2 rounded-xl border hover:bg-gray-100">

                Batal

            </button>

            <button
                type="submit"
                class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-xl">

                Ya, Hapus

            </button>

        </form>

    </div>

</div>

<script>

function openDeleteModal(button)
{
    document.getElementById('deleteForm').action =
        button.dataset.url;

    document.getElementById('deleteName').innerHTML =
        button.dataset.name;

    document.getElementById('deleteModal')
        .classList.remove('hidden');

    document.getElementById('deleteModal')
        .classList.add('flex');
}

function closeDeleteModal()
{
    document.getElementById('deleteModal')
        .classList.remove('flex');

    document.getElementById('deleteModal')
        .classList.add('hidden');
}

</script>