@extends('layouts.admin')
@section('body')
@include('layouts.partials.headeradmin')
    {{-- @include('layouts.partials.sidebaradmin') --}}
    {{-- <button class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button> --}}

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Projek</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="admin.admin">Home</a></li>
                            <li class="breadcrumb-item active">Projek</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <x-card>
                            <x-slot name="header">
                                <button onclick="addForm(`{{ route('galangdana.store') }}`)" class="btn btn-primary"><i
                                        class="fas fa-plus-circle"></i> Tambah</button>
                            </x-slot>

                            {{-- COMPONENT  --}}
                            {{-- <form action="" class="d-flex justify-content-between">
                  <x-dropdown-table />
                  <x-filter-table />
                </form> --}}

                            <x-table>
                                <x-slot name="thead">
                                    <th width="5%">No</th>
                                    <th width="20%"></th>
                                    <th>Deskripsi</th>
                                    <th>Tgl Publish</th>
                                    <th>Status</th>
                                    <th>Author</th>

                                    <th width="15%"><i class="fas fa-cog"></i></th>
                                </x-slot>


                            </x-table>


                        </x-card>

                    </div>
                </div>
            </div>

            @includeIf('galangdana.form')
        </section>
        <!-- End Main content -->
    </div>
    <x-toast />
    @includeIf('includes.datatable')
    @includeIf('includes.select2')
    @includeIf('includes.summernote')
    @includeIf('includes.datepicker')

    @push('scripts')
        <script>
            let modal = '#modal-form';
            let table;

            table = $(`.table`).DataTable({
                pageLength: 5,
                aLengthMenu: [
                    [5, 10, 20, 30, -1],
                    [5, 10, 20, 30, "All"]
                ],
                processing: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('galangdana.data') }}'
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'path_image',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'short_description'
                    },
                    {
                        data: 'publish_date',
                        searchable: false
                    },
                    {
                        data: 'status',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'author',
                        searchable: false
                    },
                    {
                        data: 'action',
                        searchable: false,
                        sortable: false
                    }
                ]
            });


            function addForm(url, title = 'Tambah') {
                $(modal).modal('show');
                $(`${modal} .modal-title`).text(title);
                $(`${modal} form`).attr('action', url);
                $('#put').remove();
                resetForm(`${modal} form`);
                $('#body').summernote('reset');
                $('.preview-path_image').attr('src', '');
            }

            function editForm(url, title = 'Edit') {
                $.get(url)
                    .done(response => {
                        $(modal).modal('show');
                        $(`${modal} .modal-title`).text(title);
                        $(`${modal} form`).attr('action', url);
                        $(`${modal} form`).append('<input type="hidden" id="put" name="_method" value="PUT">');
                        resetForm(`${modal} form`);
                        loopForm(response.data);

                        let selectedKategoris = [];
                        response.data.kategoris.forEach(item => {
                            selectedKategoris.push(item.id);
                        });

                        $('#kategoris').val(selectedKategoris).trigger('change');

                    })
                    .fail(errors => {
                        alert('Tidak dapat menampilkan data');
                        return;
                    });
            }

            function submitForm(originalForm) {
                $.post({
                        url: $(originalForm).attr('action'),
                        data: new FormData(originalForm),
                        dataType: 'json',
                        contentType: false,
                        cache: false,
                        processData: false
                    })
                    .done(response => {
                        $(modal).modal('hide');
                        showAlert(response.message, 'success');
                        table.ajax.reload();
                    })
                    .fail(errors => {
                        if (errors.status == 422) {
                            loopErrors(errors.responseJSON.errors);
                            return;
                        }

                        showAlert(errors.responseJSON.message, 'danger');
                    });
            }



            function deleteData(url) {
                if (confirm('Yakin data akan dihapus?')) {
                    $.post(url, {
                            '_method': 'delete'
                        })
                        .done(response => {
                            showAlert(response.message, 'success');
                            table.ajax.reload();
                        })
                        .fail(errors => {
                            console.log(errors);
                            showAlert('Tidak dapat menghapus data');
                            return;
                        })
                }
            }

            function resetForm(selector) {
                $(selector)[0].reset();

                $('.select2').trigger('change');
                $('.form-control, .custom-select, .custom-checkbox, .custom-radio, .select2').removeClass('is-invalid');
                $('.invalid-feedback').remove();
            }

            // function loopForm(originalForm) {
            //     for (field in originalForm) {
            //         if ($(`[name=${filed}]`).attr('type') != 'file') {
            //             if ($(`[name=${field}]`).hasClass('summernote')) {
            //                 $(`[name=${field}]`).summernote('code', originalForm[field]);
            //             }
            //              $(`[name=${field}]`).val(originalForm[filed]);
            //              $('select').trigger('change');
            //         }
            //     }
            // }

            //GPT
            // function loopForm(originalForm) {
            //     for (var field in originalForm) {
            //         if ($(`[name=${field}]`).attr('type') != 'file') {
            //             if ($(`[name=${field}]`).hasClass('summernote')) {
            //                 $(`[name=${field}]`).summernote('code', originalForm[field]);
            //             }
            //             $(`[name=${field}]`).val(originalForm[field]); // corrected typo here
            //             $('select').trigger('change');
            //         } else {
            //             $(`.preview-${field}`)
            //             .attr('src', originalForm[field])
            //             .show();
            //         }
            //     }
            // }
            function loopForm(originalForm) {
                for (field in originalForm) {
                    if ($(`[name=${field}]`).attr('type') != 'file') {
                        if ($(`[name=${field}]`).hasClass('summernote')) {

                            $(`[name=${field}]`).summernote('code', originalForm[field]);

                        } else if ($(`[name=${field}]`).attr('type') == 'radio') {

                            $(`[name=${field}]`).filter(`[value="${originalForm[field]}"]`).prop('checked', true);

                        } else {
                            $(`[name=${field}]`).val(originalForm[field]);
                        }

                        $('select').trigger('change');
                    } else {
                        $(`.preview-${field}`)
                            .attr('src', '{{ asset('assets/galangdana') }}/' + originalForm[field])
                            .show();
                    }
                }
            }







            function loopErrors(errors) {
                $('.invalid-feedback').remove();

                if (errors == undefined) {
                    return;
                }

                for (error in errors) {
                    $(`[name="${error}"]`).addClass('is-invalid');

                    if ($(`[name="${error}"]`).hasClass('select2')) {

                        $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
                            .insertAfter($(`[name="${error}"]`).next());

                    } else if ($(`[name="${error}"]`).hasClass('summernote')) {

                        $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
                            .insertAfter($(`[name="${error}"]`).next());

                    } else if ($(`[name="${error}"]`).hasClass('custom-control-input')) {

                        $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
                            .insertAfter($(`[name="${error}"]`).next());

                    } else {

                        $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
                            .insertAfter($(`[name="${error}"]`));

                    }
                }
            }


            function showAlert(message, type) {
                let title = '';
                switch (type) {
                    case 'success':
                        title = 'Success';
                        break;
                    case 'danger':
                        title = 'Failed';
                        break;

                    default:
                        break;
                }

                $(document).Toasts('create', {
                    class: `bg-${type}`,
                    title: title,
                    body: message
                });

                setTimeout(() => {
                    $('.toasts-top-right').remove();
                }, 3000);
            }
        </script>
    @endpush
@endsection
