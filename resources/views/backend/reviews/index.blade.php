@extends('backend.layouts.master')
@section('title')
{{ env('APP_NAME') }} | Support Tickets
@endsection
@section('content')
<section class="content">
    @include('flashMessage.message')
    <div class="card">
        <div class="card-header">
            Support Tickets
            
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="text-nowrap">
                        <tr>
                           <th width="5%">S.No</th>
                           <th width="10%">Review By</th>
                           <th width="50%">Message</th>
                           <th width="10%">Rating</th>
                           <th width="15%">Created On</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse($merchant_reviews as $merchant_review)
                        <tr>
                           <td width="5%">{{ $loop->iteration }}</td>
                           <td width="10%">{{ ($merchant_review->user->exists()) ? $merchant_review->user->name : 'N/a' }}</td>
                           <td width="60%" >{{ ($merchant_review->review_message) }}</td>
                           <td width="5%">{{ $merchant_review->review_rating }}</td>
                           <td width="10%">{{ date('l, d F Y, (h:i A)', strtotime($merchant_review->created_at)) }}</td>
                        </tr>
                        @empty
                        <tr>
                           <td colspan="5">
                              No reviews found
                           </td>
                        </tr>
                        @endforelse
                     </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $merchant_reviews->links() }}
        </div>
    </div>
</section>
@endsection