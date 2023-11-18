<table>
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Type of Scholarship</th>
            <th>Category</th>
            <th>Degree Program</th>
            <th>Delivering HEI</th>
            <th>Contract Period</th>
            <th>Extension Period</th>
            <th>Status</th>
            <th>Date of Graduation</th>
            <th>Number of Service Obligation</th>
            <th>End of Service Obligation</th>
            <th>Remarks</th>
            <th>Is the scholar still connected with the Sending Higher Education Institution? (Yes / No)</th>
            <th>The scholar is no longer connected due to: (Resignation, Termination, Health Reasons, Others)</th>
            <th>Does the scholar have a request for extension? (Yes / No)</th>
            <th>If yes, what is the status of the request? (Pending, Approved, Disapproved)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($scholars as $scholar)
            <tr>
                <td>
                    <img src="{{ asset('storage/profile_photos/' . $scholar->profile_photo) }}">
                </td>
                <td>{{ $scholar->full_name }}</td>
                <td>{{ $scholar->scholarship_type->name }}</td>
                <td>{{ $scholar->scholarship_category?->name }}</td>
                <td>{{ $scholar->degree_program->name }}</td>
                <td>{{ $scholar->higher_education_institute->name }}</td>
                <td>{{ $scholar->contract_start_date->format('F Y') . ' - ' . $scholar->contract_end_date->format('F Y') }}</td>
                <td>{{ $scholar->extension_period }}</td>
                <td>{{ $scholar->scholarship_status->name }}</td>
                <td>{{ $scholar->date_of_graduation?->format('m/d/Y') }}</td>
                <td>{{ ($scholar->contract_start_date?->startOfYear()->diffInYears($scholar->contract_end_date?->startOfYear()) ?? 1) * 2 }}</td>
                <td>{{ $scholar->end_of_service_obligation_date?->format('m/d/Y') }}</td>
                <td>{{ $scholar->remarks }}</td>
                <td>{{ $scholar->connected_to_hei ? 'Yes' : 'No' }}</td>
                <td></td>
                <td>{{ $scholar->extension_requested ? 'Yes' : 'No' }}</td>
                <td>{{ $scholar->extension_status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
