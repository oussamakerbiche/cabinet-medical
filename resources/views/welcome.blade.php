
        <style>

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 10px;
                margin-top:100px ;
            }


        </style>
        
        @extends('layouts.app')

        @section('content') 

        @if(session()->has('success'))

        <div class="alert alert-dismissible alert-success">
            
      <center>  {{session()->get('success') }} </center>


        </div>
        @endif

            <div class="content">
                <div class="title m-b-md">
                    Gestion Cabinet Medicale
                </div>
            </div>
        </div>

</div>
        @endsection

