@if (session("success"))
<div class=" tw-w-[95%] sm:tw-w-[90%] tw-mx-auto tw-text-white tw-font-bold tw-font-raleway tw-text-[15px] sm:tw-text-[17px] md:tw-text-[20px] tw-bg-green tw-p-4 tw-rounded-default tw-mt-5">
    {{session("success")}}
</div>
@endif

@if (session("error"))
<div class=" tw-w-[95%] sm:tw-w-[90%] tw-mx-auto tw-text-white tw-font-bold tw-font-raleway tw-text-[15px] sm:tw-text-[17px] md:tw-text-[20px] tw-bg-red tw-p-4 tw-rounded-default tw-mt-5">
    {{session("error")}}
</div>
@endif

@if (session("statut"))
<div class=" w-full bg-green p-4 rounded-default mt-5">
    {{session("success")}}
</div>
@endif
