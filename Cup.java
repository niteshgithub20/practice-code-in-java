import java.util.*;
import java.util.Scanner;
class Cup
{
    public static void main(String[] args){
        Scanner obj = new Scanner(System.in);
        int n = obj.nextInt();
        Object d = new Object();
        d.cups(n);
       
        
    }

    public void cups(int n){
        int cup;
        cup = n+n/6;
        System.out.println(cup);
    }
}