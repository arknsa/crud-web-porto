<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($portfolio) ? 'Edit Portfolio' : 'Tambah Portfolio' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 dark:bg-slate-800">

<!-- Header Start -->
<header class="fixed top-0 left-0 z-10 flex w-full items-center bg-transparent">
  <div class="container mx-auto">
    <div class="relative flex items-center justify-between">
      <div class="px-10">
        <a href="/settings" class="block py-6 text-lg font-bold text-primary">Settings</a>
      </div>
      <div class="flex items-center px-4">
        <button id="hamburger" name="hamburger" type="button" class="absolute right-4 block lg:hidden">
          <span class="hamburger-line origin-top-left transition duration-300 ease-in-out"></span>
          <span class="hamburger-line transition duration-300 ease-in-out"></span>
          <span class="hamburger-line origin-bottom-left transition duration-300 ease-in-out"></span>
        </button>

        <nav
          id="nav-menu"
          class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg dark:bg-dark dark:shadow-slate-500 lg:static lg:block lg:max-w-full lg:rounded-none lg:bg-transparent lg:shadow-none lg:dark:bg-transparent"
        >
          <ul class="block lg:flex">
            <li class="group">
              <a href="/" class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Home Page</a>
            </li>
            <li class="group">
              <a href="#about" class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">About Me</a>
            </li>
            <li class="group">
              <a href="#portfolio" class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Portfolio</a>
            </li>
            <li class="group">
              <a href="#publication" class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Publication</a>
            </li>
            <li class="group">
              <a href="#contact" class="mx-8 flex py-2 text-base text-dark group-hover:text-primary dark:text-white">Contact</a>
            </li>
            <li class="mt-3 flex items-center pl-8 lg:mt-0">
              <div class="flex">
                <span class="mr-2 text-sm text-slate-500">light</span>
                <input type="checkbox" class="hidden" id="dark-toggle" />
                <label for="dark-toggle">
                  <div class="flex h-5 w-9 cursor-pointer items-center rounded-full bg-slate-500 p-1">
                    <div class="toggle-circle h-4 w-4 rounded-full bg-white transition duration-300 ease-in-out"></div>
                  </div>
                </label>
                <span class="ml-2 text-sm text-slate-500">dark</span>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>
<!-- Header End -->


<!-- Main Content -->
<main class="container mx-auto pt-24 pb-10">
  <!-- Form Section -->
  <div class="w-full px-4 mb-10">
    <div class="p-6 bg-white rounded-lg shadow-lg">
      <h3 class="mb-4 text-2xl font-semibold text-dark dark:text-white">
          {{ isset($portfolio) ? 'Edit Portfolio' : 'Form Tambah Portfolio' }}
      </h3>
      <form action="{{ isset($portfolio) ? route('portfolios.update', $portfolio->id) : route('portfolios.store') }}" method="POST">
        @csrf
        @if(isset($portfolio))
            @method('PUT')
        @endif
        <div class="mb-4">
          <label for="title" class="block text-sm font-medium text-gray-700">Judul Portfolio</label>
          <input type="text" name="title" id="title" value="{{ isset($portfolio) ? $portfolio->title : old('title') }}" class="mt-1 block w-full rounded-md border border-black shadow-sm focus:border-black focus:ring-black">
        </div>
        
        <!-- Deskripsi Portfolio -->
        <div class="mb-4">
          <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
          <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border border-black shadow-sm focus:border-black focus:ring-black">{{ isset($portfolio) ? $portfolio->description : old('description') }}</textarea>
        </div>
        <!-- Link -->
        <div class="mb-4">
          <label for="link" class="block text-sm font-medium text-gray-700">Link Portfolio</label>
          <input type="url" name="link" id="link" value="{{ isset($portfolio) ? $portfolio->link : old('link') }}" class="mt-1 block w-full rounded-md border border-black shadow-sm focus:border-black focus:ring-black">
        </div>
        <!-- Image URL -->
        <div class="mb-4">
          <label for="image" class="block text-sm font-medium text-gray-700">URL Gambar</label>
          <input type="text" name="image" id="image" value="{{ isset($portfolio) ? $portfolio->image : old('image') }}" class="mt-1 block w-full rounded-md border border-black shadow-sm focus:border-black focus:ring-black">
        </div>
        <!-- Tombol Submit -->
        <button type="submit" class="px-4 py-2 {{ isset($portfolio) ? 'bg-green-600' : 'bg-blue-600' }} text-white rounded-md">
          {{ isset($portfolio) ? 'Update Portfolio' : 'Tambah Portfolio' }}
        </button>
      </form>
    </div>
  </div>


  <!-- Table Section Start -->
  <div class="w-full px-4">
    <div class="p-6 bg-white rounded-lg shadow-lg">
      <h2 class="mb-4 text-2xl font-semibold text-dark dark:text-white">Daftar Portfolio</h2>
      <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                  <tr>
                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Link</th>
                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                  </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                  @foreach($portfolios as $portfolio)
                  <tr>
                      <td class="px-6 py-4 whitespace-nowrap">{{ $portfolio->id }}</td>
                      <td class="px-6 py-4 whitespace-nowrap">{{ $portfolio->title }}</td>
                      <td class="px-6 py-4 whitespace-nowrap">{{ $portfolio->description }}</td>
                      <td class="px-6 py-4 whitespace-nowrap">
                          <a href="{{ $portfolio->link }}" class="text-blue-600 hover:text-blue-900" target="_blank">Lihat Link</a>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                          <img src="{{ $portfolio->image }}" alt="Gambar" class="w-16 h-16 object-cover">
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                          <!-- Link Edit -->
                        <a href="{{ route('portfolios.edit', $portfolio->id) }}" class="text-green-600 hover:text-green-900">Edit</a>

                        <!-- Form Delete -->
                        <form action="{{ route('portfolios.destroy', $portfolio->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Yakin ingin menghapus portfolio ini?')">
                                Delete
                            </button>
                          </form>                        
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
    </div>
    <!-- Table Section End -->
  </div>
</main>

<!-- Scripts -->
<script>
  // Hamburger Menu Toggle
  const hamburger = document.getElementById('hamburger');
  const navMenu = document.getElementById('nav-menu');

  hamburger.addEventListener('click', function () {
    hamburger.classList.toggle('hamburger-active');
    navMenu.classList.toggle('hidden');
  });

  // Dark Mode Toggle
  const darkToggle = document.getElementById('dark-toggle');
  const html = document.querySelector('html');

  darkToggle.addEventListener('click', function () {
    if (darkToggle.checked) {
      html.classList.add('dark');
      localStorage.theme = 'dark';
    } else {
      html.classList.remove('dark');
      localStorage.theme = 'light';
    }
  });

  // Set initial theme based on localStorage
  if (
    localStorage.theme === 'dark' ||
    (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
  ) {
    darkToggle.checked = true;
    html.classList.add('dark');
  } else {
    darkToggle.checked = false;
  }
</script>

</body>
</html>
