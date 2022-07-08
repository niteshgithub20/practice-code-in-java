import java.util.*;
public clss RevInt
{
    public static void main(String[] args)
    { 
        int nummber = 87654;
        int reverse = 0;
        while(nummber != 0)
        {
            int remainder = nummber % 10;
            reverse = reverse * 10 + remainder;
            nummber = nummber / 10;
        }
        System.out.println(reverse);

    }
}