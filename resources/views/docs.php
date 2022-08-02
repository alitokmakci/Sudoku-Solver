<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sudoku Solver API</title>
	<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
</head>

<body>
	<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
		<div class="container flex flex-wrap justify-between items-center mx-auto">
			<a href="/" class="flex items-center">
				<span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">
					Sudoku Solver API
				</span>
			</a>
			<button data-collapse-toggle="mobile-menu" type="button"
				class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
				aria-controls="mobile-menu" aria-expanded="false">
				<span class="sr-only">Open main menu</span>
				<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
						d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
						clip-rule="evenodd"></path>
				</svg>
				<svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd"
						d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
						clip-rule="evenodd"></path>
				</svg>
			</button>
			<div class="hidden w-full md:block md:w-auto" id="mobile-menu">
				<ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
					<li>
						<a href="#"
							class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
							<span
								class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
								Latest version: 1.0.0
							</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container mx-auto mt-10">
		Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque cupiditate consequuntur rem blanditiis rerum,
		incidunt voluptatem hic numquam animi vitae.
	</div>

	<div class="container mx-auto mt-10 flex">
		<div class="w-10/12">
			<div id="random">
				<h1 class="text-xl font-bold mb-4"># Getting a random problem</h1>
				<p class="mb-4">
					<code class="text-red-500">
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">GET</span>
                    /problems/random
                </code>
				</p>
				<p class="mb-4">
					Returns a random problem.
				</p>
				<p>
				<h1 class="mb-2">Example Response:</h1>
				<pre class="bg-gray-900 rounded-lg text-white p-4">
                    <code>
{
    "id": 3,
    "schema": "...56..199.....63...8..3.....983.4..5.47.6...6.......123.6.914887......549.28576.",
    "solution": "342567819957128634168943527729831456514796382683452971235679148876314295491285763",
}
                </code>
                </pre>
				</p>
			</div>
		</div>
		<div class="w-2/12">

		</div>
	</div>
	<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</body>

</html>