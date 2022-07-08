while((head1!=null && head2!=null) && head1.data == head2.data){
            head1 = head1.next;
            head2 = head2.next;
        }
        return (head1 == null && head2 == null);