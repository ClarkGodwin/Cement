@extends('layouts.header')

@section('title', 'Home')

@section('content')

<style>
	@keyframes scroll{
		0%{
			transform: translateX(0);
		}
		100%{
			/* transform: translateX(calc(-250px * 7)); */
			transform: translate(-50%); 
		}
	}

	.animation_scroll{
		animation: scroll 1000s linear infinite;
	}
</style>

<section class="tw-bg-gray dark:tw-bg-blue ">
	<div class="tw-flex tw-justify-between tw-flex-col md:tw-flex-row tw-pl-0 sm:tw-pl-6 md:tw-pl-0">

		<div class="tw-flex tw-flex-col tw-gap-[20px] tw-my-[50px]">
			<h1 class="tw-font-raleway tw-text-black dark:tw-text-white tw-font-black tw-text-[30px] sm:tw-text-[45px] lg:tw-text-[52px] tw-w-[60%] sm:tw-w-[56%] md:tw-w-[78%]">Bienvenue sur Shop.co</h1>
	
			<p class="tw-text-dark_gray tw-w-[90%] sm:tw-w-[89%] md:tw-w-[90%] lg:tw-w-[80%] xl:tw-w-[600px] tw-text-[13px] sm:tw-text-[15px] md:tw-text-[13px] xl:tw-text-[16px]">Chez SHOP.CO, nous comprenons l'importace de la qualite et de la fiabilite dans vos projets de construction. Que vous soyez un professionnel du batiment ou bricoleur passionne, nous sommes la pour vous fournir le meilleur ciment a des prix competitifs.</p>
	
			<a href="{{ route('sell')}}"><button  class="tw-bg-black tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[60%] sm:tw-w-[55%] md:tw-w-[60%] lg:tw-w-[55%] xl:tw-w-[300px] tw-text-[13px] sm:tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black">Vender maintenant</button></a>
		</div>
	
		<div class="tw-relative tw-mt-[80px]">
			<svg class="tw-w-[250px] sm:tw-w-[450px] lg:tw-w-[620px] xl:tw-w-[670px] tw-h-[200px] sm:tw-float-none sm:tw-h-full lg:tw-h-[350px] xl:tw-h-[400px] tw-pb-0 tw-float-bottom tw-cursor-auto " xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 350.14"><path d="M250.38 250.51c-27.51 0-49.82 22.3-49.82 49.82 0 27.51 22.31 49.81 49.82 49.81s49.81-22.3 49.81-49.81c0-27.52-22.3-49.82-49.81-49.82zm180.05-1.39c-27.89 0-50.51 22.61-50.51 50.51 0 27.89 22.62 50.51 50.51 50.51 27.9 0 50.51-22.62 50.51-50.51 0-27.9-22.61-50.51-50.51-50.51zm0 31.09c-10.72 0-19.41 8.69-19.41 19.42 0 10.72 8.69 19.42 19.41 19.42s19.42-8.7 19.42-19.42c0-10.73-8.7-19.42-19.42-19.42zM384.29 70.15h63.86l63.35 68.17.5 1.26v99.08c0 9.33-3.78 17.37-9.88 23.14-4.76 4.49-10.92 7.59-17.79 8.81l-.09-.15-.05-.1-.13-.24-.14-.25-.03-.06-.11-.18-.13-.24-.13-.22-.01-.03-.14-.24-.15-.24-.07-.13-.07-.11-.14-.24-.14-.24-.03-.04-.12-.2-.15-.24-.12-.19-.02-.04-.15-.24-.15-.24-.07-.1-.08-.13-.16-.24-.15-.23-.01-.02-.14-.21-.16-.24-.11-.17-.04-.06-.16-.23-.16-.23-.06-.09-.1-.13-.16-.23-.16-.23v-.01l-.16-.22-.16-.22-.17-.23-.16-.22-.17-.23-.05-.07-.11-.15-.17-.22-.16-.21-.01-.01-.17-.22-.17-.22-.1-.13-.07-.09-.18-.22-.17-.22-.04-.05-.13-.17-.18-.21-.16-.19-.02-.03-.17-.21-.18-.21-.09-.11-.09-.11-.18-.21-.18-.21-.03-.03-.16-.18-.18-.21-.15-.16-.04-.04-.18-.21-.19-.21-.08-.09-.1-.12-.19-.2-.19-.2-.01-.02-.18-.19-.19-.2-.14-.14-.05-.06-.2-.2-.19-.2-.07-.07-.12-.13-.2-.2-.19-.19c-11.08-11.08-26.38-17.93-43.28-17.93-13.4 0-25.85 4.32-35.94 11.67l-.08.05-.05.04-.12.09-.12.08-.12.09-.12.1-.24.18-.12.09-.12.09-.12.09-.05.03-.07.06-.12.09-.12.1-.12.09-.12.09-.03.03-.09.07-.12.09-.11.09-.12.1-.12.09-.02.01-.1.08-.11.1-.12.1-.12.09-.11.1-.12.09-.12.1-.11.1-.12.09-.1.09-.01.01-.12.1-.11.1-.12.09-.11.1-.09.08-.02.02-.12.1-.11.1-.11.1-.12.1-.07.06-.04.04-.11.1-.12.1-.11.1-.11.1-.06.05-.05.05-.11.1-.11.1-.11.11-.11.1-.05.04-.06.06-.11.1-.11.11-.11.1-.11.1-.03.03-.08.08-.11.1-.11.11-.11.1-.1.11-.02.01-.2.2-.11.1-.1.11-.11.11-.2.2-.09.08-.12.13-.11.11-.05.05-.04.04-.2.21-.04.04-.16.17-.01.02-.11.11-.08.07-.19.21-.01.01-.12.13-.07.08-.09.09-.1.12-.17.18-.03.03-.04.04-.2.23-.15.16-.12.14-.02.02-.05.05-.19.22-.01.02-.18.2-.05.06-.04.04-.1.11-.16.2-.02.03-.16.18-.03.03-.06.07-.13.15-.13.16-.05.07-.07.08-.11.14-.03.03-.16.19-.09.12-.07.09-.02.02-.17.21-.01.01-.18.23-.06.07-.02.04-.23.29-.04.05-.18.23v.01l-.03.03-.14.19-.1.13-.08.1-.1.13-.07.1-.17.23-.07.09-.1.15-.02.03-.12.15-.2.28-.04.05-.07.11-.06.08-.1.14-.22.31-.01.02v.01l-.04.04-.12.19-.07.1-.1.14-.12.18-.01.02-.03.04-.16.24-.04.06-.12.18-.05.07-.06.09-.05.08-.16.25-.01.01-.12.19-.03.04-.07.11-.22.35-.02.03-.06.1-.13.21-.11.18-.11.17-.03.06-.01.02-.15.25-.02.02-.13.22-.07.13-.08.12-.13.23-.01.02-.15.26-.01.01-.04.06-.09.18-.11.18-.04.07-.08.15-.06.1-.02.04-.12.22-.07.14-.07.11-.02.04-.11.2-.01.02-.13.25-.05.09-.05.09-.04.08a62.246 62.246 0 0 0-3.12 6.96h-66.44a61.082 61.082 0 0 0-13.53-20.59l.02-.02c-10.95-10.94-26.08-17.72-42.78-17.72-16.71 0-31.84 6.78-42.78 17.72l-.61.66a60.91 60.91 0 0 0-12.9 19.95h-17.57a61.082 61.082 0 0 0-13.53-20.59l.02-.02c-10.95-10.94-26.07-17.72-42.78-17.72s-31.84 6.78-42.78 17.72l-.61.66a60.91 60.91 0 0 0-12.9 19.95h-6.9c-7.07 0-12.86-5.55-12.86-12.25v-31.62c0-6.7 5.83-12.25 12.86-12.25h302.37L375.5 79.08c.26-2.37 1.29-4.66 2.87-6.31 1.52-1.6 3.55-2.62 5.92-2.62zM257.36 217.17H76.41v-37.26c7.58 2.12 14.62 4.15 21.26 6.08-.28-1.15-.21-2.28.1-3.3l53.5-176.18c1.77-5.81 5.37-7.75 11.71-5.74l54.27 17.53c11.58 4.52 12.45 7.6 7.61 21.31l-52.2 165.3c22.4 3.67 48.04 5.54 84.7 5.2v7.06zm96.84-13.06h-38.55c-.72 0-1.31.6-1.31 1.32v10.43c0 .72.59 1.31 1.31 1.31h38.55c.72 0 1.31-.59 1.31-1.31v-10.43c0-.73-.59-1.32-1.31-1.32zm3.33-68.67h-9.6c-.77 0-1.43.65-1.43 1.43v4.55l-28-5.3 5.68-19.29c4.79-12.53 1.08-16.56-11.49-27.4-28.35-24.45-52.4-42.66-74.97-55.89-.54 2.75-1.46 5.79-2.68 9.28l-51.48 163.04c33.28 3.56 67.96 1.62 104.34-4.5 13.7-2.31 12.72-4.56 15.2-12.98l.49-1.63 36.23 5.95v6.34c0 .77.64 1.43 1.43 1.43h9.6c.79 0 1.34-.65 1.43-1.43l6.68-62.17c.08-.79-.67-1.43-1.43-1.43zM141.01 3.67c-28.05-1.68-59.58.95-99 5.95-9.92 1.26-13.07 2.62-16.12 12.29L3.03 94.4c-4.37 13.86-5.08 13.44 5.16 23.67 25.92 25.92 52.51 45.46 79.97 59.56L141.01 3.67zm310.92 97.5 35.69 38.41v14h-78.98v-52.41h43.29zm-331.7 149.34c-27.51 0-49.82 22.3-49.82 49.82 0 27.51 22.31 49.81 49.82 49.81s49.81-22.3 49.81-49.81c0-27.52-22.3-49.82-49.81-49.82zm0 30.65c-10.59 0-19.17 8.58-19.17 19.17 0 10.58 8.58 19.16 19.17 19.16 10.58 0 19.16-8.58 19.16-19.16 0-10.59-8.58-19.17-19.16-19.17zm130.15 0c-10.59 0-19.17 8.58-19.17 19.17 0 10.58 8.58 19.16 19.17 19.16 10.58 0 19.16-8.58 19.16-19.16 0-10.59-8.58-19.17-19.16-19.17z"/></svg>
		
			<svg class="tw-w-[40px] sm:tw-w-[60px] lg:tw-w-[90px] xl:tw-w-[100px] tw-absolute tw-bottom-0 tw-left-0 tw-cursor-auto" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 98.188" enable-background="new 0 0 122.88 98.188" xml:space="preserve"><g><path d="M106.512,65.303c0.729-0.078,1.377,0.442,1.463,1.17c0.178,1.568,0.377,3.979,0.363,6.133 c-0.008,1.598-0.143,3.074-0.492,4.023c-0.25,0.685-1.014,1.041-1.697,0.784c-0.686-0.25-1.041-1.013-0.785-1.697 c0.242-0.649,0.328-1.812,0.342-3.124c0-1.997-0.199-4.308-0.363-5.827C105.264,66.037,105.787,65.388,106.512,65.303 L106.512,65.303z M100.482,10.179c1.227-0.136,2.383-0.171,3.459-0.086c1.035,0.079,1.99,0.271,2.846,0.592 c0.686,0.25,1.447-0.1,1.697-0.784c0.25-0.685-0.1-1.448-0.783-1.698c-1.092-0.399-2.283-0.642-3.553-0.742 c-1.24-0.107-2.568-0.072-3.959,0.085C98.473,7.732,98.736,10.366,100.482,10.179L100.482,10.179z M67.262,10.179 c-1.227-0.136-2.383-0.171-3.459-0.086c-1.035,0.079-1.991,0.271-2.846,0.592c-0.685,0.25-1.448-0.1-1.698-0.784 c-0.25-0.685,0.1-1.448,0.785-1.698c1.091-0.399,2.283-0.642,3.552-0.742c1.24-0.107,2.566-0.072,3.957,0.085 C69.27,7.732,69.008,10.366,67.262,10.179L67.262,10.179z M59.738,55.871h48.401v2.797H59.738V55.871L59.738,55.871z M59.738,37.529h48.401v2.797H59.738V37.529L59.738,37.529z M107.695,44.103l-0.146,1.94l-1.754-0.08h-0.16l-0.066,3.762 l0.107,2.792h-2.66l0.133-2.526l-0.066-4.028h-0.172l-1.768,0.08l-0.16-0.186l0.146-1.941h6.42L107.695,44.103L107.695,44.103z M100.021,49.713l0.107,2.805H97.23l-2.42-4.6h-0.16l-0.012,1.489l0.105,3.111h-2.42l0.133-2.526l-0.133-6.075h2.898l2.42,4.6h0.16 l-0.08-4.507l2.445-0.146L100.021,49.713L100.021,49.713z M91.299,50.391l0.145,0.186l-0.158,1.941h-6.063l0.133-2.526 l-0.133-6.075h6.168l0.146,0.187l-0.172,1.94l-2.115-0.08h-1.369l-0.025,1.21h1.314l1.383-0.04l0.146,0.186l-0.16,1.94 l-1.541-0.039h-1.197l-0.012,0.505l0.025,0.744h1.277L91.299,50.391L91.299,50.391z M84.09,52.518h-2.34l-0.066-2.605l-0.146-2.167 h-0.16l-1.383,3.961h-2.006l-1.145-3.961h-0.16l-0.186,1.914l-0.133,2.858h-2.221l0.838-8.602h3.07l0.254,1.223l0.758,3.124h0.158 l0.838-3.031l0.307-1.316h3.031L84.09,52.518L84.09,52.518z M73.57,50.391l0.146,0.186l-0.16,1.941h-6.061l0.131-2.526 l-0.131-6.075h6.168l0.146,0.187l-0.174,1.94l-2.113-0.08h-1.369l-0.027,1.21h1.316l1.383-0.04l0.146,0.186l-0.16,1.94 l-1.541-0.039h-1.197l-0.014,0.505l0.027,0.744h1.275L73.57,50.391L73.57,50.391z M64.635,43.77c0.762,0,1.479,0.12,2.152,0.359 l-0.451,2.114l-0.174,0.106c-0.23-0.124-0.496-0.224-0.797-0.299s-0.582-0.113-0.838-0.113c-0.541,0-0.932,0.157-1.17,0.472 s-0.359,0.839-0.359,1.576c0,0.859,0.139,1.486,0.412,1.881c0.275,0.395,0.705,0.592,1.289,0.592c0.248,0,0.525-0.024,0.832-0.073 c0.305-0.049,0.574-0.117,0.805-0.206l0.211,0.133l-0.211,2.101c-0.533,0.168-1.148,0.253-1.848,0.253 c-1.428,0-2.502-0.373-3.225-1.117c-0.723-0.744-1.083-1.83-1.083-3.257c0-1.436,0.388-2.548,1.163-3.337 C62.119,44.165,63.215,43.77,64.635,43.77L64.635,43.77z M2.676,62.438h12.085V14.409c-2.316-1.154-3.911-3.542-3.911-6.291V7.012 C10.851,3.157,14.008,0,17.871,0l0,0c3.863,0,7.012,3.157,7.012,7.012v1.114c0,2.749-1.603,5.137-3.911,6.292v48.028h12.31 c1.354,0,2.46,1.105,2.46,2.46v15.411c0,9.825-8.038,17.871-17.871,17.871l0,0C8.046,98.188,0,90.149,0,80.316V65.122 C0,63.647,1.202,62.438,2.676,62.438L2.676,62.438L2.676,62.438z M53.979,43.479c-0.283-6.195-0.739-10.255-0.957-11.764 c-0.757-5.214-0.672-8.739-0.451-15.208c0.028-0.834,0.107-1.469,0.171-1.947c0.328-2.589,0.356-2.803-2.924-3.688 c-1.191-0.321-2.068-0.777-2.425-1.555c-0.357-0.785-0.321-1.968,0.256-3.745c1.198-0.085,2.546,0,3.916,0.093 c1.854,0.121,3.745,0.243,5.57-0.015c2.518-0.356,5.235-0.806,8.052-1.269c3.496-0.578,7.154-0.361,10.77-0.846 c7.375-0.984,4.799-1.027,11.674-0.428c6.932,0.606,14,1.045,22.045,2.686c0.094,0.021,0.186,0.029,0.271,0.029l10.021-0.136 c0.299,1.355,0.348,2.382,0.113,3.16c-0.25,0.82-0.906,1.427-2.025,1.933l-0.158,0.071c-2.01,0.92-2.816,1.284-3.244,2.304 c-0.277,0.656-0.236,1.241-0.164,2.211c0.051,0.692,0.129,1.641,0.094,2.924c-0.137,5.321-0.281,9.038-1.215,14.359 c-0.188,1.127-0.592,3.275-0.957,9.585c-0.326,5.668-0.342,2.799-0.055,8.064c0.34,6.204,0.816,10.068,1.012,11.237 c0.934,5.321,1.078,11.305,1.215,16.625c0.035,1.284-0.043,2.232-0.094,2.925c-0.072,0.97-0.113,1.555,0.164,2.211 c0.428,1.02,1.234,1.383,3.244,2.304l0.158,0.07c1.119,0.507,1.775,1.113,2.025,1.934c0.234,0.777,0.186,1.804-0.113,3.159 l-10.021-0.136c-0.086,0-0.178,0.008-0.271,0.028c-8.045,1.641-15.113,2.285-22.045,2.891c-6.875,0.6-4.299,0.557-11.674-0.428 c-3.615-0.485-7.273-0.473-10.77-1.051c-2.816-0.463-5.534-0.912-8.052-1.269c-1.826-0.257-3.716-0.136-5.57-0.015 c-1.369,0.093-2.717,0.178-3.916,0.093c-0.578-1.776-0.613-2.96-0.256-3.744c0.356-0.777,1.234-1.234,2.425-1.555 c3.28-0.885,3.252-1.099,2.924-3.688c-0.064-0.479-0.143-1.113-0.171-1.947c-0.221-6.469-0.306-12.261,0.451-17.474 c0.211-1.468,0.614-5.876,0.917-12.22C54.167,45.513,54.182,47.913,53.979,43.479L53.979,43.479z M115.016,42.24 c0.297-6.181,0.797-8.096,0.971-9.092c0.861-5.842,1.104-8.881,1.25-14.808c0.035-1.477-0.035-2.46-0.094-3.181 c-0.041-0.571-0.07-0.92-0.041-0.978c0.035-0.078,0.57-0.321,1.91-0.935l0.158-0.071c1.846-0.841,2.959-1.961,3.451-3.573 c0.449-1.476,0.299-3.273-0.342-5.613c-0.158-0.564-0.678-0.977-1.291-0.97l-10.928,0.15c-8.123-1.647-15.248-2.101-22.195-2.708 c-7.039-0.621-4.641-0.563-12.242,0.449c-3.717,0.492-7.369,0.275-10.855,0.854c-2.782,0.463-5.464,0.905-7.996,1.262 c-1.555,0.222-3.316,0.107-5.042-0.007c-1.818-0.121-3.602-0.235-5.242,0.014l0,0c-0.463,0.071-0.87,0.378-1.048,0.849 c-1.098,2.931-1.148,5.007-0.449,6.526c0.742,1.634,2.225,2.503,4.137,3.017c1.055,0.285,1.048,0.321,0.984,0.799 c-0.071,0.542-0.157,1.248-0.192,2.197c-0.228,6.647-0.298,10.322,0.472,15.664c0.204,1.406,0.783,5.27,0.97,11.414 c0.086,2.824,0.045,3.871-0.038,6.712c-0.183,6.284-0.734,10.52-0.932,11.888c-0.77,5.342-0.7,11.283-0.472,17.931 c0.036,0.948,0.122,1.654,0.192,2.196c0.064,0.479,0.071,0.514-0.984,0.799c-1.912,0.514-3.395,1.384-4.137,3.018 c-0.699,1.519-0.649,3.594,0.449,6.525c0.178,0.471,0.585,0.777,1.048,0.849l0,0c1.641,0.249,3.424,0.136,5.242,0.015 c1.726-0.114,3.488-0.229,5.042-0.008c2.532,0.356,5.214,0.799,7.996,1.263c3.486,0.578,7.139,0.565,10.855,1.058 c7.602,1.013,5.203,1.069,12.242,0.449c6.947-0.606,14.072-1.265,22.195-2.912l10.928,0.15c0.613,0.007,1.133-0.407,1.291-0.971 c0.641-2.339,0.791-4.137,0.342-5.612c-0.492-1.612-1.605-2.732-3.451-3.573l-0.158-0.071c-1.34-0.614-1.875-0.856-1.91-0.935 c-0.029-0.057,0-0.406,0.041-0.978c0.059-0.72,0.129-1.704,0.094-3.181c-0.146-5.928-0.389-11.232-1.25-17.074 c-0.182-1.039-0.758-4.777-1.035-10.833C114.791,46.702,114.846,45.782,115.016,42.24L115.016,42.24z M59.651,67.963 c0.728,0.078,1.248,0.734,1.17,1.462c-0.135,1.227-0.171,2.382-0.086,3.459c0.079,1.034,0.271,1.99,0.592,2.846 c0.25,0.685-0.1,1.448-0.785,1.698c-0.685,0.249-1.447-0.101-1.697-0.785c-0.399-1.091-0.642-2.282-0.742-3.552 c-0.107-1.241-0.072-2.567,0.086-3.958C58.267,68.407,58.928,67.885,59.651,67.963L59.651,67.963z"/></g></svg>
	
			<svg class="tw-w-[30px] sm:tw-w-[50px] tw-absolute tw-top-0 tw-right-[55%] sm:tw-right-[46%] md:tw-right-[30%] tw-cursor-auto" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.88" style="enable-background:new 0 0 122.88 122.88" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M62.43,122.88h-1.98c0-16.15-6.04-30.27-18.11-42.34C30.27,68.47,16.16,62.43,0,62.43v-1.98 c16.16,0,30.27-6.04,42.34-18.14C54.41,30.21,60.45,16.1,60.45,0h1.98c0,16.15,6.04,30.27,18.11,42.34 c12.07,12.07,26.18,18.11,42.34,18.11v1.98c-16.15,0-30.27,6.04-42.34,18.11C68.47,92.61,62.43,106.72,62.43,122.88L62.43,122.88z"/></g></svg>
	
			<svg class="tw-w-[30px] sm:tw-w-[50px] tw-absolute tw-top-[45%] tw-left-0 tw-cursor-auto" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.88" style="enable-background:new 0 0 122.88 122.88" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M62.43,122.88h-1.98c0-16.15-6.04-30.27-18.11-42.34C30.27,68.47,16.16,62.43,0,62.43v-1.98 c16.16,0,30.27-6.04,42.34-18.14C54.41,30.21,60.45,16.1,60.45,0h1.98c0,16.15,6.04,30.27,18.11,42.34 c12.07,12.07,26.18,18.11,42.34,18.11v1.98c-16.15,0-30.27,6.04-42.34,18.11C68.47,92.61,62.43,106.72,62.43,122.88L62.43,122.88z"/></g></svg>
		</div>

	</div>
</section>

<section class="tw-bg-black tw-z-0 tw-overflow-x-hidden">
	<div class=" tw-flex tw-items-center tw-justify-center  tw-overflow-x-hidden">
		<ul id="scroll_list" class=" tw-text-white tw-w-auto tw-font-akaya tw-font-black tw-text-[20px] sm:tw-text-[30px]  md:tw-text-[40px] lg:tw-text-[45px] tw-flex tw-items-center tw-whitespace-nowrap tw-gap-[10px] sm:tw-gap-[20px] md:tw-gap-[30px] lg:tw-gap-[40px] tw-py-[20px] animation_scroll">

			@foreach ($items as $item)
			@php
				if($item->standard != 'null' && $item->standard != ''){
					$name = $item->name . '_'. $item->standard;
				}
				else{
					$name = $item->name;
				}
			@endphp

			<li>{{ $name}}</li>
			@endforeach
		</ul>
	</div>

</section>

<section class=" tw-pt-[70px] dark:tw-bg-dark_blue">
	<div class="tw-flex tw-justify-between tw-items-center ">
		<h1 class="tw-font-akaya tw-text-black tw-font-black dark:tw-text-white tw-text-[23px] sm:tw-text-[40px] lg:tw-text-[80px] tw-py-2">Recents posts</h1>

		<a href="{{ Route('all')}}" class="tw-flex tw-justify-center tw-items-center tw-w-[30%] xl:tw-w-[20%] tw-text-[11px] sm:tw-text-[17px] tw-font-raleway tw-bg-black tw-text-white tw-py-[8px] md:tw-py-[13px] tw-rounded-triple tw-font-black">Voir plus</a>

	</div>

	<div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 md:tw-grid-cols-3 lg:tw-grid-cols-4 tw-gap-y-[80px] tw-gap-x-[20px] tw-mt-[50px] ">
		@foreach ($items as $item)
			
		<div class=" tw-flex tw-flex-col tw-gap-[10px] tw-font-raleway tw-border tw-border-transparent tw-bg-gray dark:tw-bg-blue tw-py-8 tw-px-4 md:tw-px-6 tw-rounded-double">
			@foreach ($images_items as $image_item )
				@if ($image_item->id_item == $item->id)
				<img src="{{ asset("storage/".$image_item->path)}}" alt="Image" class=" tw-w-full tw-rounded-double">
				@break
					
				@endif
			
			@endforeach

			<h2 class=" tw-text-bold tw-font-black dark:tw-text-white tw-text-[15px] sm:tw-text-[17px] md:tw-text-[21px] tw-mt-[20px]l">
				@if ($item->standard != 'null' && $item->standard != '')
				{{ucfirst($item->name). '_'. ucfirst($item->standard)}}
				
				@else
				{{ucfirst($item->name)}}
					
				@endif

			</h2>

			<p class=" tw-font-bold">{{ $item->unity_price}} BIF</p>

			<div class=" tw-flex tw-items-center tw-gap-2">
				@php
					$user = App\Models\User::find($item->id_user);
				@endphp
				@if ($user->profile_photo)
				<img src="{{asset('storage/'. $user->profile_photo)}}" alt="" class=" tw-w-[15%] tw-rounded-full">

				@else
				<svg version="1.1" class=" tw-w-[15%]" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.88" style="enable-background:new 0 0 122.88 122.88" xml:space="preserve"><g><path d="M61.44,0c8.32,0,16.25,1.66,23.5,4.66l0.11,0.05c7.47,3.11,14.2,7.66,19.83,13.3l0,0c5.66,5.65,10.22,12.42,13.34,19.95 c3.01,7.24,4.66,15.18,4.66,23.49c0,8.32-1.66,16.25-4.66,23.5l-0.05,0.11c-3.12,7.47-7.66,14.2-13.3,19.83l0,0 c-5.65,5.66-12.42,10.22-19.95,13.34c-7.24,3.01-15.18,4.66-23.49,4.66c-8.31,0-16.25-1.66-23.5-4.66l-0.11-0.05 c-7.47-3.11-14.2-7.66-19.83-13.29L18,104.87C12.34,99.21,7.78,92.45,4.66,84.94C1.66,77.69,0,69.76,0,61.44s1.66-16.25,4.66-23.5 l0.05-0.11c3.11-7.47,7.66-14.2,13.29-19.83L18.01,18c5.66-5.66,12.42-10.22,19.94-13.34C45.19,1.66,53.12,0,61.44,0L61.44,0z M16.99,94.47l0.24-0.14c5.9-3.29,21.26-4.38,27.64-8.83c0.47-0.7,0.97-1.72,1.46-2.83c0.73-1.67,1.4-3.5,1.82-4.74 c-1.78-2.1-3.31-4.47-4.77-6.8l-4.83-7.69c-1.76-2.64-2.68-5.04-2.74-7.02c-0.03-0.93,0.13-1.77,0.48-2.52 c0.36-0.78,0.91-1.43,1.66-1.93c0.35-0.24,0.74-0.44,1.17-0.59c-0.32-4.17-0.43-9.42-0.23-13.82c0.1-1.04,0.31-2.09,0.59-3.13 c1.24-4.41,4.33-7.96,8.16-10.4c2.11-1.35,4.43-2.36,6.84-3.04c1.54-0.44-1.31-5.34,0.28-5.51c7.67-0.79,20.08,6.22,25.44,12.01 c2.68,2.9,4.37,6.75,4.73,11.84l-0.3,12.54l0,0c1.34,0.41,2.2,1.26,2.54,2.63c0.39,1.53-0.03,3.67-1.33,6.6l0,0 c-0.02,0.05-0.05,0.11-0.08,0.16l-5.51,9.07c-2.02,3.33-4.08,6.68-6.75,9.31C73.75,80,74,80.35,74.24,80.7 c1.09,1.6,2.19,3.2,3.6,4.63c0.05,0.05,0.09,0.1,0.12,0.15c6.34,4.48,21.77,5.57,27.69,8.87l0.24,0.14 c6.87-9.22,10.93-20.65,10.93-33.03c0-15.29-6.2-29.14-16.22-39.15c-10-10.03-23.85-16.23-39.14-16.23 c-15.29,0-29.14,6.2-39.15,16.22C12.27,32.3,6.07,46.15,6.07,61.44C6.07,73.82,10.13,85.25,16.99,94.47L16.99,94.47L16.99,94.47z"/></g></svg>
					
				@endif
				<span class="  tw-font-semibold">
					{{ucfirst($user->last_name).'_'.ucfirst(substr($user->first_name, 0, 1)). '.'}}
				</span>
			</div>

			@php
				$encoded = base64_encode($item->id); 
			@endphp

			<a href="{{ Route('details', $encoded)}}" class=" tw-flex tw-justify-center tw-font-rroboto tw-bg-black tw-text-white tw-py-[8px] tw-rounded-triple tw-mt-[20px] tw-font-black tw-w-[50%]">
				Details
			</a>

			<button class=" tw-flex tw-justify-center tw-font-roboto tw-bg-black tw-text-white tw-py-[8px] tw-rounded-triple tw-mt-[20px] tw-font-black tw-w-[85%]" data-bs-toggle="modal" data-bs-target="#cart_modal_{{$item->id}}">
				Ajouter au panier
			</button>

            <div class="modal fade" id="cart_modal_{{$item->id}}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content dark:tw-bg-dark_blue tw-rounded-double">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 tw-font-bold tw-font-raleway">Ajouter au panier pour preparer une commande</h1>
                    <button type="button" class="btn-close dark:tw-bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('carts_add') }}" method="post" class=" tw-flex tw-flex-col tw-w-[100%] md:tw-w-[90%] tw-mx-auto">
                      @csrf

                      <input type="hidden" name="id" value="{{$item->id}}">

                      <label for="quantity">Nombre de sacs parmi ceux disponible</label>
                      <input type="number" name="quantity" id="quantity" class=" tw-w-full tw-p-3" min="1" max="{{$item->quantity}}" required>
      
                      <button type="submit" class="tw-bg-black dark:tw-bg-white dark:tw-text-black tw-mt-10 tw-text-white tw-py-[12px] tw-rounded-triple tw-w-[60%] sm:tw-w-[50%] md:tw-w-[50%] lg:tw-w-[45%] xl:tw-w-[300px] tw-text-[16px] md:tw-text-[13px] lg:tw-text-[16px] tw-font-roboto tw-font-black">Soumettre</button>
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>

		</div>
			
		@endforeach
	</div>

</section>

@endsection
